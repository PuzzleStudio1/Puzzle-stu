<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Auth\TwoFactorAuthentication;
use Validator;
use App\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    protected $twoFactor;

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

    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
     public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'phone' => 'required|numeric|digits:11|unique:users',
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

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $input = $request->all();
        $user = User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'phone' => $input['phone']
        ]);

        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->first_name;

        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'User register successfully.'
        ];

        return response()->json($response, 200);
    }

    protected function getUser($request)
    {
        return User::where('phone',$request->phone)->firstOrFail();
    }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function loginFirst(Request $request)
    {
        if( $this->getUser($request) ) {
            $response = [
                'success' => true,
                'message' => 'User Verify SMS Sent!'
            ];
            $user = $this->getUser($request);
            $this->twoFactor->requestCode($user);
            return response()->json($response, 200);
        } else {
            return response()->json(['error' => 'User Not Found'], 401);
        }
    }
    
    public function loginVerify(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'code' => 'required|numeric|digits:6|exists:two_factor',
            ],
            [
                'code.digits'=>'کد وارد شده نامعتبر میباشد.',
                'code.required'=>'لطفا کد تایید را وارد کنید .',
                'code.numeric'=>'کد تایید وارد شده ساختار اشتباهی دارد.',
                'code.exists'=>'کد تایید وارد شده اشتباه است.'
            ]
        );
        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 403);
        }

        $loginRequest = User::where('phone', $request->phone)->firstOrFail();
        Auth::loginUsingId($loginRequest->id);

        $user = Auth::user();
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['first_name'] = $user->first_name;
        return response()->json(
            [
                'success' => $success,
            ]
        , 200);
    }
}