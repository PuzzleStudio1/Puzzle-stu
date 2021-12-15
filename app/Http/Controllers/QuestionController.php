<?php

namespace App\Http\Controllers;

use App\Question;
use App\User;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;

class QuestionController extends Controller
{
    public function store(User $user, $classroom_id, Request $request)
    {
        $request->validate(
            [
                'text' => ['required'],
            ],
            [
                'phone.required' => 'لطفا تلفن همراه خود را وارد نمایید',
            ]
        );

        $question =  Question::create([
            'text' => $request['text'],
            'classroom_id' => $classroom_id,
            'user_id' => $user->id,
        ]);

        // return response()->json(['return' => 'success']);
    }

    public function storeGuest( Request $request)
    {
        $username = $request['name'];
        $text = $request['text'];
        $classid = $request['class_id'];
        // $userid = $request['userid'];

        Question::create([
            "classroom_id" => $classid,
            "name" => $username,
            "text" => $text,
        ]);
        // $question =  Question::create([
        //     'text'=>$request['text'],
        //     'classroom_id'=>$classroom_id,
        //     'name'=>$request['name'],
        //     'phone'=>$request['phone'],
        // ]);

        return response()->json(['return' => 'success']);
    }


    public function indexQuestion($classroom_id, Request $request)
    {
        $questions =  Question::where('classroom_id', $classroom_id)->get();

        return $questions;
    }

    public function indexClassroom($classroom_id)
    {
        $questions = Question::where('classroom_id', $classroom_id)->orderBy('created_at', 'desc')->paginate(50);

        Verta::setStringformat('Y/n/j H:i:s');

        foreach ($questions as $question) {
            $question->created_at = new Verta($question->created_at);
        }

        return view('admin.questionClassroom', compact('questions'));
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return back()->with('success', true);
    }

    public function instituteDestroy(Question $question)
    {
        $question->delete();

        return back()->with('success', true);
    }
}
