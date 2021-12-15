<?php

namespace App\Http\Controllers;

use App\Classroom;
use Illuminate\Http\Request;

class BigBlueButtonController extends Controller
{
    public function createMeeting($classroom)
    {
        $classroom = Classroom::where('id', $classroom)->first();

        \Bigbluebutton::create([
            'meetingID' => $classroom->id,
            'meetingName' => $classroom->name,
            'attendeePW' => 'ap',
            'moderatorPW' => 'mp',
            'endCallbackUrl'  => route('webinar.frontend', $classroom->course->id),
            'logoutUrl' => route('webinar.frontend', $classroom->course->id)
        ]);

        return back()->with('success', true);
    }

    public function joinAdmin($classroom)
    {
        $classroom = Classroom::where('id', $classroom)->first();
        $username = auth()->user()->first_name . ' ' . auth()->user()->last_name;

        $url = \Bigbluebutton::start([
            'meetingID' => $classroom->id,
            'moderatorPW' => 'mp', //moderator password set here
            'attendeePW' => 'ap', //attendee password here
            'userName' => $username, //for join meeting 
            'redirect' => true // only want to create and meeting and get join url then use this parameter 
        ]);

        return redirect()->to($url);
    }

    public function joinUser($classroom)
    {
        $classroom = Classroom::where('id', $classroom)->first();
        $username = auth()->user()->first_name . ' ' . auth()->user()->last_name;

        return redirect()->to(
            \Bigbluebutton::join([
                'meetingID' => $classroom->id,
                'userName' => $username,
                'password' => 'ap' //which user role want to join set password here
            ])
        );
        


        // meeting is running
        // $a = \Bigbluebutton::isMeetingRunning([
        //     'meetingID' => $classroom->id,
        // ]);
        // dd($a);
    }

    public function joinUserGuest(Request $request, $classroom)
    {
        $classroom = Classroom::where('id', $classroom)->first();
        $username = $request['name'];

        return redirect()->to(
            \Bigbluebutton::join([
                'meetingID' => $classroom->id,
                'userName' => $username,
                'password' => 'ap' //which user role want to join set password here
            ])
        );
    }

    public function index()
    {
        //all meeting
        $bbbs = \Bigbluebutton::all();
// dd($bbbs[1]->meetingName);
        return view('admin.bbbIndex',compact('bbbs'));

    }
}
