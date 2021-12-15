<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Support\Payment\Transaction;
use App\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }



    public function verify(Request $request)
    {
        return  $this->transaction->verify($request->Authority,$request->Status)
            ? $this->sendSuccessResponse()
            : $this->sendErrorResponse();
    }

    private function sendErrorResponse()
    {
        return redirect()->route('user.dashboard',auth()->user())->with('transaction unsuccessful',true);
    }

    private function sendSuccessResponse()
    {
        return redirect()->route('user.dashboard',auth()->user())->with('transaction confirm',true);
    }

    public function adminIndex()
    {
        $payments = Payment::orderBy('created_at', 'desc')->paginate(10);

        return view('admin.paymentIndex',compact('payments'));
    }

    public function userIndex(User $user)
    {
        # code...
    }
}
