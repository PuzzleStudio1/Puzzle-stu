<?php

namespace App\Support\Payment;

use App\Order;
use App\Payment;
use Illuminate\Http\Request;
use App\Support\Basket\Basket;
use App\Support\Payment\Gateways\GatewayInterface;
use Illuminate\Support\Str;
use SoapClient;

class Transaction
{
    private $request;

    private $basket;


    public function __construct(Request $request, Basket $basket)
    {
        $this->request = $request;
        $this->basket = $basket;
    }


    public function checkout()
    {
        $order = $this->makeOrder();

        $payment = $this->makePayment($order);

        $result = $this->redirectToBank($order);

        // $this->completeOrder($order);
        session()->put('order_id', $order->id);

        return $result;
    }


    public function redirectToBank($order)
    {
        $MerchantID = '4283de61-0174-49e4-b645-fd53c04bb301'; //Required
        $Amount = $order->price; //Amount will be based on Toman - Required
        $Description = var_dump($order->courses); // Required
        // $Email = 'erfan.mirzaee8620@Mail.Com'; // Optional
        $Mobile = auth()->user()->phone; // Optional
        $CallbackURL = route('payment.verify'); // Required
        
        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
        
        // $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest(
            [
                'MerchantID' => $MerchantID,
                'Amount' => $Amount,
                'Description' => $Description,
                // 'Email' => $Email,
                'Mobile' => $Mobile,
                'CallbackURL' => $CallbackURL,
            ]
        );

        return $result;
    }


    public function verify($authority, $status)
    {
        $order_id = session()->get('order_id');

        $MerchantID = '4283de61-0174-49e4-b645-fd53c04bb301';

        $Amount = $this->basket->subTotal();

        if ($status == 'OK') {

            $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
            // $client = new SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

            $result = $client->PaymentVerification(
                [
                    'MerchantID' => $MerchantID,
                    'Authority' => $authority,
                    'Amount' => $Amount,
                ]
            );

            $this->confirmPayment($order_id, $authority);

            $this->basket->clear();

            session()->forget('order_id');

            return true;
        } else {
            return false;
        }
    }

    private function confirmPayment($order_id, $authority)
    {
        $order = Order::find($order_id);

        $order->payment->update([
            'status' => 1,
            'ref_num' => $authority
        ]);

        $courses = $order->courses;

        auth()->user()->courses()->syncWithoutDetaching($courses);
    }

    private function makeOrder()
    {
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'code' => bin2hex(Str::random(16)),
            'price' => $this->basket->subTotal()
        ]);

        $order->giveCoursesTo($this->basket->all());

        return $order;
    }


    private function makePayment($order)
    {
        return Payment::create([
            'order_id' => $order->id,
            'price' => $order->price
        ]);
    }
}
