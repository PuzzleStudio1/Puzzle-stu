<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Services\Auth\TwoFactorAuthentication;
use App\User;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $twoFactor;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;
    use ThrottlesLogins;

    protected $maxAttempts = 4;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TwoFactorAuthentication $twoFactor)
    {
        $this->twoFactor = $twoFactor;
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        session()->push('oldUrl', url()->previous());
        
        return view('auth.login');
    }

    public function showCodeForm()
    {
        return view('auth.login-code');
    }

    public function login(Request $request)
    {
        // $request->phone = $this->convert($request->phone);
// dd($request->phone);
        $this->validateForm($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        if (!$this->getUser($request)) {
            $this->incrementLoginAttempts($request);
            return $this->sendLoginFailedResponse();
        }
        
        
        $user = $this->getUser($request);
        
        $this->twoFactor->requestCode($user);

        return redirect()->route('auth.login.code.form');

    }

    function convert($string) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];
    
        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);
    
        return $englishNumbersOnly;
    }

    public function confirmCode(Request $request)
    {
        $response = $this->twoFactor->login();
        return   $response === $this->twoFactor::AUTHENTICATED
            ? $this->sendSuccessResponse()
            : back()->with('invalidCode', true);
    }

    protected function getUser($request)
    {
        return User::where('phone',$request->phone)->firstOrFail();
    }

    protected function validateForm(Request $request)
    {
        // dd($request->phone);
        $request->validate([
            'phone'=>['required','numeric','exists:users','digits:11']
        ],[
            'phone.required'=>'لطفا شماره تلفن خود را وارد نمایید.',
            'phone.numeric'=>'شماره تلفن فقط میتواند عدد باشد.',
            'phone.exists'=>'شماره تلفن وارد شده در سامانه ثبت نشده است لطفا دوباره تلاش کنید.',
            'phone.digits'=>'شماره تلفن باید 11 رقم باشد.'
        ]);
    }


    protected function sendSuccessResponse()
    {
        session()->regenerate();

        $url = session('oldUrl');

        session()->forget('oldUrl');

        if ($url == null) {
            return redirect()->route('home');
        } else {
            return redirect($url[0]);
        }
    }


    protected function sendLoginFailedResponse()
    {
        return back()->with('wrongCredentials',true);
    }


    public function logout()
    {
        Auth::logout();

        session()->invalidate();

        return redirect()->route('home');
    }


    protected function username()
    {
        return 'phone';
    }
    
    protected function userIndex(Request $request)
    {
        return $request->user();
    }

}
