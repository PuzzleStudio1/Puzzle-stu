<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\SendSms;
// use Melipayamak\MelipayamakApi;

class TwoFactor extends Model
{
    const CODE_EXPIRY = 90; //seconds
    protected $table = 'two_factor';
    protected $fillable = [
        'user_id',
        'code'
    ];


    public static function generateCodeFor(User $user)
    {
        $user->code()->delete();
        return static::create([
            'user_id' => $user->id,
            'code' => mt_rand(100000, 999999)
        ]);
    }

    public function getCodeForSendAttribute()
    {
        return $this->code;
    }


    public function send()
    {
        SendSms::dispatch($this->user, $this->code_for_send);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function isExpired()
    {
        return $this->created_at->diffInSeconds(now()) > static::CODE_EXPIRY;
    }


    public function isEqualWith($code)
    {
        return $this->code == $code;
    }
}
