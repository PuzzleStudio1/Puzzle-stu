<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;
use Kavenegar;
use App\Task;
use App\Role;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::orderBy('dotime', 'desc')->paginate(50);

        $users = Role::findOrFail(5)->users;

        return view('admin.tasks.index', compact('users', 'tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];
        $num = range(0, 9);
        $englishNumbersOnly = str_replace($arabic, $num, str_replace($persian, $num, $request['dotime']));

        $splitTimeStamp = explode(" ",$englishNumbersOnly);
        $time = explode(":", $splitTimeStamp[1]);
        $date = explode("/", $splitTimeStamp[0]);
        
        $v = Verta::getGregorian($date[0],$date[1],$date[2]);
        $vv = Carbon::create($v[0], $v[1], $v[2], $time[0], $time[1], $time[2], 'UTC');
        $vv = $vv->format('Y/m/d H:i:s');

        $task = Task::create([
            'title' => $request['title'],
            'user_id' => $request['userdoing'],
            'maker_id' => Auth::user()->id,
            'course_id' => $request['course'],
            'description' => $request['description'],
            'dotime' => $vv,
            'completed' => false
        ]);

        $receptor =  $task->user->phone;
        $template =  "employeetask";
        $type =  "sms";
        $token = $task->user->first_name;
        $token2 =  'کار';
        $token3 =  $task->maker->first_name;
        $result = Kavenegar::VerifyLookup($receptor, $token, $token2, $token3, $template, $type);

        return redirect()->route('tasks.index')->with('taskCreate', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();

        return back()->with('success', true);
    }
}
