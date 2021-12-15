<?php

namespace App\Http\Controllers;

use App\Notif;
use App\Course;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NotifController extends Controller
{
    //
    public function index()
    {
        $notifs = Notif::orderBy('notif_date', 'desc')->paginate(50);
        $courses = Course::all();

        return view('admin.notif.list', compact('notifs', 'courses'));
    }

    public function store(Request $request)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];
        $num = range(0, 9);
        $englishNumbersOnly = str_replace($arabic, $num, str_replace($persian, $num, $request['date']));

        $splitTimeStamp = explode(" ",$englishNumbersOnly);
        $time = explode(":", $splitTimeStamp[1]);
        $date = explode("/", $splitTimeStamp[0]);
        
        $v = Verta::getGregorian($date[0],$date[1],$date[2]);
        $vv = Carbon::create($v[0], $v[1], $v[2], $time[0], $time[1], $time[2], 'UTC');
        $vv = $vv->format('Y/m/d H:i:s');
        $notif = Notif::create([
            'title' => $request['title'],
            'text' => $request['text'],
            'course_id' => $request['course'],
            'notif_date' => $vv
        ]);

        return redirect()->route('notif.index')->with('notifCreate', true);
    }

    public function edit($id)
    {
        $notif = Notif::find($id);

        return view('notif.edit')->with('notif', $notif);
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        Notif::destroy($id);

        return back()->with('notifDelete', true);
    }
}
