<?php

namespace App\Http\Controllers;

use App\Course;
use App\iframe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IframeController extends Controller
{
    public function checkToken($token,$courseID)
    {
        $iframe = iframe::where('token',$token)->where('course_id',$courseID)->first();
        $url = parse_url($_SERVER['HTTP_REFERER'])['host'];
        if ($iframe->url == $url && $iframe->course_id == $courseID) {
            $course = DB::table('courses')->where('id',$courseID)->first();
            // dd($course);
            if (!empty($course->live_class)) {
                $liveClass = DB::table('classrooms')->where('id',$course->live_class)->first();
                $player = DB::table('players')->where('id',$liveClass->player_id)->first();
                return view('iframe',compact('player','course','liveClass'));
            } 
            // return to blade
            abort(404, 'Course Not Started Yet!');
        } else {
            abort(403, 'Domain Access - '.$url);
        }
    }
}
