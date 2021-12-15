<?php

namespace App\Services\Notification\Providers;

use App\Services\Notification\Providers\Constracrs\Provider;
use App\User;
use Exception;
use Melipayamak\MelipayamakApi;
use Kavenegar;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

class SmsProvider implements Provider
{
    private $user;
    private $text;

    public function __construct(User $user, String $text)
    {
        $this->user = $user;
        $this->text = $text;
    }

    public function send()
    {
        $phone = $this->user->phone;
        $text = $this->text;
        // try{
            $receptor =  "$phone";
            $template =  "newlogin";
            $type =  "sms";
            $token = $text;
            $token2 =  "";
            $token3 =  "";
            $result = Kavenegar::VerifyLookup($receptor, $token, $token2, $token3, $template, $type);
            // $this->format($result);
        // } catch (ApiException $e) {
        //     echo $e->errorMessage();
        // } catch (HttpException $e) {
        //     echo $e->errorMessage();
        // }

        // $phone = $this->user->phone;
        // $text = $this->text;
        // $apikey = "49572F54444A4F6E5562544C6550527779385845514F2F6D67336475446F3075";
        // $url = "https://api.kavenegar.com/v1/" . $apikey . "/verify/lookup.json?receptor=" . $phone . "&token=" . $text . "&template=myverification";


        //     $username = '09123273140';
        // $password = '2454';
        // $api = new MelipayamakApi($username, $password);
        // $smsSoap = $api->sms('soap');
        // $to = $this->user->phone;
        // $text = [$this->text];
        // $bodyId = 22468;
        // $response = $smsSoap->sendByBaseNumber($text, $to, $bodyId);
    }
}
