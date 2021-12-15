<?php

namespace App\Jobs;

use App\TwoFactor;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

class TwoFactorPurne
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function handel()
    {    
        TwoFactor::where('created_at', '>', Carbon::now()->subMinutes(5))->delete();
        logger('abbas');
    }
}
