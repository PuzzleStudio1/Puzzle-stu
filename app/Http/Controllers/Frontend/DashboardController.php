<?php

namespace App\Http\Controllers\Frontend;

use App\Absence;
use App\Booklet;
use App\City;
use App\Classroom;
use App\Course;
use App\Task;
use App\Http\Controllers\Controller;
use App\Player;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Auth;
use App\Services\Uploader\Uploader;

class DashboardController extends Controller
{
    private $uploader;

    public function __construct(Uploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function dashboard()
    {
        $user = auth()->user();

        $courses = $user->courses()->orderBy('created_at', 'desc')->take(4)->get();

        $upcomingClasses = [];
        $liveClasses = [];

        Verta::setStringformat('d F H:i');

        foreach ($courses as $course) {

            $firstClass = $course->classrooms()->where([['link', null], ['player_id', null], ['finished', 0]])->first();

            if ($firstClass != null) {
                $firstClass->classroom_date = new Verta($firstClass->classroom_date);
                array_push($upcomingClasses, $firstClass);
            }
        }

        foreach ($courses as $course) {
            $liveClass = $course->classrooms()->where('player_id', '!=', null)->first();

            if ($liveClass != null) {
                $liveClass->classroom_date = new Verta($liveClass->classroom_date);
                array_push($liveClasses, $liveClass);
            }
        }

        return view('dashboard.dashboard', compact('courses', 'user', 'upcomingClasses', 'liveClasses'));
    }

    public function editUser()
    {
        $user = auth()->user();

        $cities = City::all();

        return view('dashboard.editProfile', compact('user', 'cities'));
    }

    public function updateUser(Request $request)
    {
        $user = auth()->user();

        if ($request->file('file') !== null) {
            $file = $this->uploader->upload();

            $user->update([
                'photo_id' => $file->id,
            ]);
        }

        $user->update([
            'school' => $request['school'],
            'grade' => $request['grade'],
            'field_of_study' => $request['field_of_study'],
            'city_id' => $request['city'],
            'address' => $request['address'],
            'info' => $request['info'],
        ]);

        $user->save();

        return back()->with('userUpdate', true);
    }

    public function dashboardCourses()
    {
        $user = auth()->user();
        
        $courses = $user->courses()->orderBy('created_at', 'desc')->get();

        return view('dashboard.courses', compact('courses', 'user'));
    }

    public function courses(User $user)
    {
        $user = auth()->user();

        $coursesTeach = Course::where('teacher_id', $user->id)->orderBy('created_at','desc')->get();

        $coursesInstitute = Course::where('institute_id', $user->id)->orderBy('created_at','desc')->get();

        if ($user == auth()->user()) {
            return view('dashboard.coursesTeachInstitute', compact('coursesTeach', 'coursesInstitute', 'user'));
        } else {
            return back();
        }

    }

    public function classrooms(Course $course)
    {
        $user = auth()->user();

        if ($course->teacher_id == $user->id || $course->institute_id == $user->id) {

            $classrooms = $course->classrooms()->orderBy('classroom_date','desc')->get();

            foreach ($classrooms as $classroom) {
                $classroom->classroom_date = new Verta($classroom->classroom_date);
                $classroom->classroom_end_date = new Verta($classroom->classroom_end_date);
            }

            return view('dashboard.classrooms', compact('classrooms', 'user'));
        } else {

            return back();

        }
    }

    public function booklets(Course $course)
    {
        $user = auth()->user();

        if ($course->teacher_id == $user->id || $course->institute_id == $user->id) {

            $booklets = $course->booklets()->get();

            return view('dashboard.booklets', compact('booklets', 'user', 'course'));
        } else {
            return back();
        }
    }

    public function bookletStore(Course $course, Request $request)
    {
        $this->validateCourseStoreForm($request);

        $user = auth()->user();

        if ($course->teacher_id == $user->id || $course->institute_id == $user->id) {

            $file = $this->uploader->upload();

            Booklet::create([
                'name' => $request['name'],
                'type' => $request['type'],
                'description' => $request['description'],
                'course_id' => $course->id,
                'file_id' => $file->id
            ]);

            return back()->with('success', true);

        } else {
            return back();
        }
        
    }

    public function validateCourseStoreForm(Request $request)
    {
        return $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'file' => ['required', 'file', 'mimetypes:image/jpeg,video/mp4,application/zip,application/pdf,image/png']

        ], [
            'name.required' => 'لطفا نام را وارد کنید.',
            'type.required' => 'لطفا نوع را انتخاب کنید.',
            'file.required' => 'لطفا فایل مورد نظر را انتخاب کنید.',
            'file.mimetypes' => 'شما فقط میتوانید فرمت های jpeg,mp4,zip,pdf را آپلود کنید .'
        ]);
    }

    public function bookletDestroy(Booklet $booklet)
    {
        $user = auth()->user();

        if ($booklet->course->teacher_id == $user->id ||$booklet->course->institute_id == $user->id) {

            $booklet->delete();

            $file = $booklet->file();

            $file->delete();

            return back()->with('success', true);

        } else {

            return back();
            
        }
    }

    public function students(Course $course)
    {
        $user = auth()->user();
        
        if ($course->teacher_id == $user->id || $course->institute_id == $user->id) {

            return view('dashboard.students', compact('user', 'course'));

        } else {
            return back();
        }
    }

    public function questions(User $user, Classroom $classroom)
    {
        $user = auth()->user();

        $questions = $classroom->questions()->orderBy('created_at', 'desc')->get();

        Verta::setStringformat('Y/n/j H:i:s');

        foreach ($questions as $question) {
            $question->created_at = new Verta($question->created_at);
        }

        return view('dashboard.question', compact('questions', 'user'));
    }

    public function absences(User $user,Classroom $classroom)
    {
        $user = auth()->user();

        $students = $classroom->course->users;

        foreach ($students as $student) {
            if ($student->hasAbsenceClassroom($classroom->id)) {
                foreach ($student->absences->where('classroom_id',$classroom->id) as $absence) {
                    $start = verta($absence->created_at);
                    $end = verta($absence->updated_at);
                    $duration = $start->diffMinutes($end);
                    $student->absenceDuration += $duration;
                }
            } else {
                $student->absenceDuration = 'غایب';
            }
        }
        
        return view('dashboard.absences',compact('students','user'));
    }

    public function TvShowIndex()
    {
        $classrooms = Classroom::where('player_id', '!=', null)->with('player')->get();

        $user = auth()->user();
        
        return view('dashboard.tvIndex', compact('classrooms','user'));
    }
    
    public function courseList()
    {
        $courses = Course::orderBy('created_at','desc')->get();
        
        $user = auth()->user();
        
        return view('dashboard.courseList', compact('courses','user'));
    }
    
    public function tasksList()
    {
        $user = Auth::user();

        $task_todo = Task::where('user_id', $user->id)->where('completed',false)->get();
        $task_done = Task::where('user_id', $user->id)->where('completed',true)->get();


        return view('dashboard.tasks', compact('task_todo', 'task_done', 'user'));
    }
    
    public function tasksCheck(Request $request)
    {
        $task = Task::where('id', $request['id'])->first();
        $task->update(['completed'=>true]);

        return back()->with('success', true);

    }
    
    public function courseClassroom(Course $course)
    {
        $user = auth()->user();

        $players = Player::all();

        $classrooms = Classroom::where('course_id',$course->id)->orderBy('classroom_date','desc')->get();

        foreach ($classrooms as $classroom) {
            $classroom->classroom_date = new Verta($classroom->classroom_date);
            $classroom->classroom_end_date = new Verta($classroom->classroom_end_date);
        }

        return view('dashboard.classroomCourseList', compact('course','classrooms', 'players','user'));
    }
}
