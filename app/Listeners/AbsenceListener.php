<?php

namespace App\Listeners;

use App\Absence;
use App\Events\AbsenceEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AbsenceListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AbsenceEvent  $event
     * @return void
     */
    public function handle(AbsenceEvent $event)
    {
        Absence::create([
            'user_id'=>$event->user->id,
            'classroom_id'=>$event->classroom,
            'present'=>true
        ]);
    }
}
