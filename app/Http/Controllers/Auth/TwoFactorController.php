<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Auth\TwoFactorAuthentication;
use Illuminate\Support\Facades\Auth;
use App\TwoFactor;

class TwoFactorController extends Controller
{
    protected $twoFactor;

    public function __construct(TwoFactorAuthentication $twoFactor)
    {
        $codes = TwoFactor::all();
        foreach ($codes as $code) {
            if ($code->created_at->diffInSeconds(now()) >300) {
                $code->delete();
            }
        }
        $this->twoFactor = $twoFactor;
    }

    public function activate()
    {
        $response = $this->twoFactor->requestCode(Auth::user());

        return $response === $this->twoFactor::CODE_SENT
            ? redirect()->route('auth.two.factor.code.form')
            : back()->with('cantSendCode', true);
    }


    public function resent()
    {
        $this->twoFactor->resent();

        return back()->with('codeResent', true);
    }


    public function confirmCode(Request $request)
    {
        $this->validateForm($request);
        $response = $this->twoFactor->activate();
        return $response === $this->twoFactor::ACTIVATED
            ? redirect()->route('auth.thirdRegister')
            : back()->with('invalidCode', true);
    }

    protected function validateForm($request)
    {
        $request->validate([
            'code'=>['required','numeric','digits:6','exists:two_factor']
        ],
        [
            'code.digits'=>'کد وارد شده نامعتبر میباشد.',
            'code.required'=>'لطفا کد تایید را وارد کنید .',
            'code.numeric'=>'کد تایید وارد شده ساختار اشتباهی دارد.',
            'code.exists'=>'کد تایید وارد شده اشتباه است.'
        ]
    );
    }
}
