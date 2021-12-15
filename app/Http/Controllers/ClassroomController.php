<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Course;
use App\Player;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    public function courseClassroom(Course $course)
    {
        $players = Player::all();

        $classrooms = Classroom::where('course_id',$course->id)->orderBy('classroom_date','desc')->get();

        foreach ($classrooms as $classroom) {
            $classroom->classroom_date = new Verta($classroom->classroom_date);
            $classroom->classroom_end_date = new Verta($classroom->classroom_end_date);
        }

        return view('admin.classroomCourseList', compact('course','classrooms', 'players'));
    }

    public function LiveOrArchive($course_id, $classroom_id, Request $request)
    {
        if ($request['link'] != null) {
            $this->goArchive($course_id, $classroom_id, $request);

            return back()->with('success', true);
        } else {
            $this->goLive($course_id, $classroom_id, $request);

            return back()->with('success', true);
        }
    }

    protected function goLive($course_id, $classroom_id, Request $request)
    {
        $course = Course::find($course_id);

        $classroom = Classroom::find($classroom_id);

        if ($request['player_id'] != null) {

            $course->update([
                'live_class' => $classroom_id
            ]);
            $course->save();
        } else {

            $course->update([
                'live_class' => null
            ]);
            $course->save();
        }

        $classroom->update([
            'player_id' => $request['player_id'],
            'finished' => 0,
            'link' => null
        ]);

        $classroom->save();
    }

    protected function goArchive($course_id, $classroom_id, Request $request)
    {
        $this->validateGoArchive($request);

        $course = Course::find($course_id);

        $classroom = Classroom::find($classroom_id);

        $course->update([
            'live_class' => null
        ]);

        $course->save();

        $classroom->update([
            'player_id' => null,
            'link' => $request['link']
        ]);

        $classroom->save();
    }

    protected function validateGoArchive($request)
    {
        $request->validate(
            [
                'link' => ['required']
            ],
            [
                'link.required' => 'لطفا لینک را وارد نمایید.',
            ]
        );
    }

    public function storeForCourse(Request $request, Course $course)
    {
        if ($request['free'] == 'on') {
            $free = 1;
        }else{
            $free = 0;
        }

        $this->validateStoreForCourse($request);

        Classroom::create([
            'name' => $request['name'],
            'course_id' => $course->id,
            'classroom_date' => $request['classroom_date'],
            'classroom_end_date' => $request['classroom_end_date'],
            'stu_num' => $request['stu_num'],
            'free' => $free
        ]);

        return back()->with('success', true);
    }

    protected function validateStoreForCourse($request)
    {
        $request->validate(
            [
                'name' => ['required', 'string'],
                'classroom_date' => ['required'],
                'stu_num' => ['required'],
                'classroom_end_date' => ['required'],
            ],
            [
                'name.required' => 'لطفا نام کلاس را وارد نمایید.',
                'classroom_date.required' => 'لطفا تاریخ و زمان کلاس را مشخص کنید.',
                'stu_num.required' => 'لطفا شماره استودیو را وارد نمایید.',
                'classroom_end_date.required' => 'لطفا تاریخ و زمان پایان کلاس را وارد نمایید.',
            ]
        );
    }

    public function destroy(Classroom $classroom)
    {
        if ($classroom->player_id == null) {

            $classroom->delete();

            return back()->with('success', true);
        } else {
            return back()->with('classroom is live', true);
        }
        
    }

    public function finish(Classroom $classroom)
    {
        $course = $classroom->course;

        $classroom->update([
            'finished' => 1,
            'player_id' => null,
        ]);

        $classroom->save();

        $course->update([
            'live_class' => null
        ]);

        $course->save();
        
        return back()->with('success', true);
        
    }

    public function edit(Classroom $classroom)
    {
        return view('admin.classroomEdit', compact('classroom'));
    }

    public function update(Request $request,Classroom $classroom)
    {
        if ($request['free'] == 'on') {
            $free = 1;
        }else{
            $free = 0;
        }

        $this->validateUpdate($request);

        $classroom->update([
            'name' => $request['name'],
            'classroom_date' => $request['classroom_date'],
            'classroom_end_date' => $request['classroom_end_date'],
            'stu_num' => $request['stu_num'],
            'free' => $free,
        ]);
        $course = $classroom->course;

        return redirect()->route('classroom.courseClassroom',compact('course'))->with('success', true);
    }

    public function validateUpdate(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string'],
                'classroom_date' => ['required'],
                'stu_num' => ['required'],
                'classroom_end_date' => ['required'],
            ],
            [
                'name.required' => 'لطفا نام کلاس را وارد نمایید.',
                'classroom_date.required' => 'لطفا تاریخ و زمان کلاس را مشخص کنید.',
                'stu_num.required' => 'لطفا شماره استودیو را وارد نمایید.',
                'classroom_end_date.required' => 'لطفا تاریخ و زمان پایان کلاس را وارد نمایید.',
            ]
        );
    }
}
