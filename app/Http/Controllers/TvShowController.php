<?php

namespace App\Http\Controllers;

use App\Absence;
use App\Classroom;
use App\Question;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TvShowController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::where('player_id', '!=', null)->with('player')->get();
        return view('admin.tvIndex', compact('classrooms'));
    }

    public function classroomsQuestions(Request $request)
    {
        $now = verta();
        
        $questions = [];
        
        $question = Question::whereIn('classroom_id', $request->classrooms)->orderBy('created_at', 'desc')->get();
        
        foreach ($question as $q) {
            array_push($questions, $q);
        }
        
        foreach ($questions as $question) {
            $time = verta($question->created_at);
            $question->timeDiff = $time->diffMinutes($now);
            
            if ($question->voice_id != null) {
                $question->voice->path = str_replace("public", "storage", $question->voice->path);
            }
        }
        
        $presentUser = [];
        
        foreach ($request->classrooms as $classroom) {
            $course = Classroom::find($classroom)->course;
            
            if ($course->type == 'free') {
                
                $presentUsers = Absence::where('classroom_id', $classroom)->where('present', 1)->with('user')->get();
                array_push($presentUser, $presentUsers);
            } else {
                
                $students = $course->users;
                
                foreach ($students as $student) {
                    if ($student->hasAbsenceClassroom($classroom)) {
                        array_push($presentUser, $student);
                    }
                }
            }
        }

        $userCount = count($presentUser);

        return view('admin.tvshow', compact('questions', 'presentUser', 'course', 'userCount'));
    }
    public function questions($classroom_id)
    {
        $now = verta();

        $course = Classroom::find($classroom_id)->course;

        if ($course->type == 'free') {
            $presentUsers = Absence::where('classroom_id', $classroom_id)->where('present', 1)->with('user')->get();
        } else {
            $presentUsers = [];
            $students = $course->users;
            foreach ($students as $student) {
                $absences = $student->absences->where('classroom_id', $classroom_id)->where('present', 1);
                if (count($absences) != 0) {
                    array_push($presentUsers, $student);
                }
            }
        }

        $userCount = count($presentUsers);

        $questions = Question::where('classroom_id', $classroom_id)->skip(0)->take(50)->orderBy('created_at', 'desc')->get();

        foreach ($questions as $question) {
            $time = verta($question->created_at);
            $question->timeDiff = $time->diffMinutes($now);
            if ($question->voice_id != null) {
                $question->voice->path = str_replace("public", "storage", $question->voice->path);
            }
        }

        $presentUser = null;

        return view('admin.tvshow', compact('questions', 'presentUsers','presentUser', 'course', 'userCount'));
    }
}
