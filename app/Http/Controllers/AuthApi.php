<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;
use App\Course;

class AuthApi extends Controller
{
    public function login(Request $request)
    {
        $user_check = User::where(['phone' => $request->phone])->first();
        $course_id = 187;
        $course = Course::where(['id' => $course_id])->first();
        
        if(Auth::check())
        {
            $user = Auth::user();
            $course_check = $course->users()->where('course_id', $course_id)->where('user_id', $user->id)->get();
            if(!$course_check)
                $course->users()->attach($user);
            return redirect()->route('webinar.frontend', $course->id);
        }
        else
        {
            if(!$user_check)
            {
                $validator = Validator::make($request->all(), [
                    'phone' => 'required|numeric|unique:users',
                    'first_name' => 'required|string|max:20',
                    'last_name' => 'required|string|max:20',
                    'course_id' => 'required|string|max:20'
                ]);
    
                $user = User::Create([
                    'first_name' => $request->phone,
                    'last_name' => $request->phone,
                    'phone' => $request->phone,
                    'school' => "ATCCE"
                ]);
                Auth::login($user);
                $course->users()->attach($user);
                return redirect()->route('webinar.frontend', $course->id);
            }
            else {
                Auth::login($user_check);
                $user = Auth::user();
                $course_check = $course->users()->where('course_id', $course_id)->where('user_id', $user->id)->get();
                if(!$course_check)
                    $course->users()->attach($user);
                return redirect()->route('webinar.frontend', $course->id);
            }
        }
    }
}