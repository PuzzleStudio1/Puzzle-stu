<?php

namespace App\Http\Controllers\Auth;

use App\City;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\Auth\TwoFactorAuthentication;
use App\TwoFactor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Uploader\Uploader;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    private $uploader;

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TwoFactorAuthentication $twoFactor,Uploader $uploader)
    {
        $this->uploader = $uploader;
        
        $this->middleware('guest');
        $this->twoFactor = $twoFactor;
    }

    public function showFirstRegistrationForm()
    {
        session()->push('oldUrl', url()->previous());

        return view('auth.firstRegister');
    }

    public function showFirstRegistrationOldUserForm()
    {
        return view('auth.firstRegisterUsername');
    }

    public function showSecondRegistrationForm()
    {
        return view('auth.secondRegister');
    }

    public function showThirdRegistrationForm()
    {
        $cities = City::all();
        return view('auth.thirdRegister', compact('cities'));
    }

    public function firstRegisterOldUser(Request $request)
    {
        $this->firstValidateFormOldUser($request);

        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone']
        ]);

        DB::table('old_users')->where('username',$request['username'])->update([
            'user_id'=>$user->id
        ]);

        $this->twoFactor->requestCode($user);

        return redirect()->route('auth.secondRegister.form');
    }

    protected function firstValidateFormOldUser($request)
    {
        $request->validate(
            [
                'username' => ['required', 'string', 'exists:old_users'],
                'first_name' => ['required', 'string', 'max:20'],
                'last_name' => ['required', 'string', 'max:20'],
                'phone' => ['required', 'numeric', 'digits:11', 'unique:users']
            ],
            [
                'username.exists' => 'نام کاربری وارد شده معتبر نمیباشد.',
                'username.required' => 'لطفا نام کاربر خود را وارد نمایید.',
                'phone.required' => 'لطفا تلفن همراه خود را وارد نمایید',
                'phone.numeric' => 'شماره تلفن فقط میتواند عدد باشد.',
                'phone.digits' => 'شماره تلفن نمیتواند بیش از 11 رقم باشد .',
                'phone.unique' => 'این شماره تلفن قبلا در سامانه ثبت شده لطفا با شماره تلفن دیگر ثبت نام کنید.',
                'last_name.required' => 'لطفا نام خانوادگی خود را وارد نمایید.',
                'first_name.required' => 'لطفا نام خود را وارد نمایید.'
            ]
        );
    }

    public function firstRegister(Request $request)
    {
        
        $this->firstValidateForm($request);

        $user = User::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone']
        ]);

        $this->twoFactor->requestCode($user);

        return redirect()->route('auth.secondRegister.form');
    }

    protected function firstValidateForm($request)
    {
        $request->validate(
            [
                'first_name' => ['required', 'string', 'max:20'],
                'last_name' => ['required', 'string', 'max:20'],
                'phone' => ['required', 'numeric', 'digits:11', 'unique:users']
            ],
            [
                'phone.required' => 'لطفا تلفن همراه خود را وارد نمایید',
                'phone.numeric' => 'شماره تلفن فقط میتواند عدد باشد.',
                'phone.digits' => 'شماره تلفن نمیتواند بیش از 11 رقم باشد .',
                'phone.unique' => 'این شماره تلفن قبلا در سامانه ثبت شده لطفا با شماره تلفن دیگر ثبت نام کنید.',
                'last_name.required' => 'لطفا نام خانوادگی خود را وارد نمایید.',
                'first_name.required' => 'لطفا نام خود را وارد نمایید.'
            ]
        );
    }

    public function thirdRegister(Request $request)
    {
        $user = User::findOrFail(session('user_id'));

        if ($request->file('file') !== null) {
            $file = $this->uploader->upload();
            
            $user->update([
            'photo_id' => $file->id,
            ]);
        }

        $user->update([
            'city_id' => $request['city'],
            'address' => $request['address'],
            'info' => $request['info'],
            'birthday' => $request['datepick'],
        ]);

        $user->is_verify = true;

        $user->save();

        // Auth::logoutOtherDevices('123456');

        Auth::login($user);

        $url = session('oldUrl');

        session()->forget('oldUrl');

        if ($url == null) {
            return redirect()->route('home');
        } else {
            return redirect($url[0]);
        }

    }
}
