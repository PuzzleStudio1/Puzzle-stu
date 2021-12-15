<?php

namespace App\Services\Notification\Providers;

use App\Services\Notification\Providers\Constracrs\Provider;
use Illuminate\Mail\Mailable;
use App\User;

class EmailProvider implements Provider
{
    private $user;
    private $mailable;

    public function __construct(User $user,Mailable $mailable)
    {
        $this->user = $user;
        $this->mailable = $mailable;
    }
    
    public function send()
    {
        // 
    }
}