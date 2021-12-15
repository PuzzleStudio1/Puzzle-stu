<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\Support\Basket\Basket;
use App\Support\Payment\Transaction;


class BasketController extends Controller
{
    private $basket;
    private $transaction;

    public function __construct(Basket $basket, Transaction $transaction)
    {
        $this->middleware('auth')->only(['checkoutForm', 'checkout']);
        $this->basket = $basket;
        $this->transaction = $transaction;
    }

    public function add(Course $course)
    {
        $this->basket->add($course);

        return back()->with('add to basket',true);
    }

    public function remove(Course $course)
    {
        $this->basket->remove($course);

        return back()->with('success',true);
    }

    public function index()
    {
        $items = $this->basket->all();

        return view('basket', compact('items'));
    }

    // public function checkoutForm()
    // {
    //     return view('checkout')
    // }

    public function checkout(Request $request)
    {
        $result =  $this->transaction->checkout();

        if ($result->Status == 100) {
            return redirect()->to('https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
        } else {
            return redirect()->route('user.dashboard')->with('transaction failed',true);
        }
    }
}
