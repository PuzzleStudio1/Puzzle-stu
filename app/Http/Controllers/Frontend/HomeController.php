<?php

namespace App\Http\Controllers\Frontend;

use App\Absence;
use App\Category;
use App\Classroom;
use App\Course;
use App\Http\Controllers\Controller;
use App\Permission;
use App\Question;
use App\Services\Uploader\Uploader;
use App\Support\Basket\Basket;
use App\Tag;
use App\User;
use App\Voice;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    private $basket;

    public function __construct(Basket $basket, Uploader $uploader)
    {
        $this->uploader = $uploader;
        $this->basket = $basket;
    }

    public function index(Request $request)
    {     
        $items = $this->basket->all();

        $specialCourses = Tag::find(1)->courses()->where('status', 'public')->orderBy('created_at','desc')->get();

        $conferences = Tag::find(2)->courses()->where('status', 'public')->orderBy('created_at','desc')->get();

        return view('index', compact('specialCourses', 'conferences', 'items'));
    }

    public function webinar(Course $course)
    {
        if ($course->id == 71) {
            if (!empty($course->live_class)) {
                $liveClass = $course->liveClass()->first()->player()->first();
            } else {
                $liveClass = null;
            }

            $courses = Tag::findOrFail(3)->courses()->orderBy('created_at', 'desc')->get();

            if (!empty($course->live_class)) {

                if (Auth::check()) {
                    $userID = Auth::user()->id;
                    $firstname = Auth::user()->first_name;
                    $lastname = Auth::user()->last_name;
                    $username = $firstname . " " . $lastname;
                } else {
                    $userID = "0";
                    $username = "دانش آموز میهمان";
                }

                if ($course->chat) {
                    $questions = $course->liveClass->questions;
                } else {
                    $questions = [];
                }

                $classid = $course->live_class;

                return view('webinarSinuhe', compact('course', 'liveClass', 'questions', "userID", "classid", "username", 'courses'));
            }

            return view('webinarSinuhe', compact('course', 'liveClass', 'courses'));
        }

        if (!empty($course->live_class)) {
            $liveClass = $course->liveClass()->first()->player()->first();
        } else {
            $liveClass = null;
        }

        $freeClassroom = [];

        $classrooms = Classroom::where('course_id', $course->id)->orderBy('classroom_date', 'asc')->get();

        foreach ($classrooms as $classroom) {
            if ($classroom->free == 1) {
                array_push($freeClassroom, $classroom);
            }
        }

        $booklets = $course->booklets()->get();

        $homeworks = [];
        $handouts = [];
        $answers = [];

        foreach ($booklets as $booklet) {
            switch ($booklet->type) {
                case 'Homework':
                    array_push($homeworks, $booklet);
                    break;

                case 'Handout':
                    array_push($handouts, $booklet);
                    break;

                case 'Answer':
                    array_push($answers, $booklet);
                    break;
            }
        }

        $permission = Permission::find(5);

        if (Auth::check()) {
            if ($course->teacher != auth()->user() && $course->institute != auth()->user() && !auth()->user()->hasPermission($permission)) {

                switch ($course->type) {
                    case 'free':

                        break;
                    case 'login':
                        if (Auth::check()) {
                            if (auth()->user()->hasCourse($course->id)) {
                            } else {
                                $homeworks = [];
                                $handouts = [];
                                $answers = [];
                                $classrooms = $freeClassroom;
                            }
                        } else {
                            $homeworks = [];
                            $handouts = [];
                            $answers = [];
                            $classrooms = $freeClassroom;
                        }
                        break;
                    case 'paid':
                        if (Auth::check()) {
                            if (auth()->user()->hasCourse($course->id)) {
                            } else {
                                $homeworks = [];
                                $handouts = [];
                                $answers = [];
                                $classrooms = $freeClassroom;
                            }
                        } else {
                            $homeworks = [];
                            $handouts = [];
                            $answers = [];
                            $classrooms = $freeClassroom;
                        }
                        break;
                    case 'class':
                        if (Auth::check()) {
                            if (auth()->user()->hasCourse($course->id)) {
                            } else {
                                $homeworks = [];
                                $handouts = [];
                                $answers = [];
                                $classrooms = $freeClassroom;
                            }
                        } else {
                            $homeworks = [];
                            $handouts = [];
                            $answers = [];
                            $classrooms = $freeClassroom;
                        }
                        break;
                }
            }
        } else {
            switch ($course->type) {
                case 'free':

                    break;
                case 'login':
                    $homeworks = [];
                    $handouts = [];
                    $answers = [];
                    $classrooms = $freeClassroom;
                    break;
                case 'paid':
                    $homeworks = [];
                    $handouts = [];
                    $answers = [];
                    $classrooms = $freeClassroom;
                    break;
                case 'class':
                    $homeworks = [];
                    $handouts = [];
                    $answers = [];
                    $classrooms = $freeClassroom;
                    break;
            }
        }
        Verta::setStringformat('d F ');

        foreach ($classrooms as $classroom) {
            $classroom->classroom_date = new Verta($classroom->classroom_date);
        }

        if (!empty($course->live_class)) {

            if (Auth::check()) {
                $userID = Auth::user()->id;
                $firstname = Auth::user()->first_name;
                $lastname = Auth::user()->last_name;
                $username = $firstname . " " . $lastname;
            } else {
                $userID = "0";
                $username = "دانش آموز میهمان";
            }
            if ($course->chat) {
                $questions = $course->liveClass->questions;
            } else {
                $questions = [];
            }
            
            $classid = $course->live_class;

            // if ($liveClass->id == 1 || $liveClass->id == 23 || $liveClass->id == 24 || $liveClass->id == 25 || $liveClass->id == 26) {
            //     return view('webinarPuzzlePlayer', compact('course', 'homeworks', 'handouts', 'answers', 'liveClass', 'questions', "userID", "classid", "username", 'classrooms'));
            // }

            return view('webinarnew', compact('course', 'homeworks', 'handouts', 'answers', 'liveClass', 'questions', "userID", "classid", "username", 'classrooms'));
        }

        return view('webinarnew', compact('course', 'homeworks', 'handouts', 'answers', 'classrooms','liveClass'));
    }
    public function live(Course $course)
    {
        if ($course->id == 71) {
            if (!empty($course->live_class)) {
                $liveClass = $course->liveClass()->first()->player()->first();
            } else {
                $liveClass = null;
            }

            $courses = Tag::findOrFail(3)->courses()->orderBy('created_at', 'desc')->get();

            if (!empty($course->live_class)) {

                if (Auth::check()) {
                    $userID = Auth::user()->id;
                    $firstname = Auth::user()->first_name;
                    $lastname = Auth::user()->last_name;
                    $username = $firstname . " " . $lastname;
                } else {
                    $userID = "0";
                    $username = "دانش آموز میهمان";
                }

                if ($course->chat) {
                    $questions = $course->liveClass->questions;
                } else {
                    $questions = [];
                }

                $classid = $course->live_class;

                return view('webinarSinuhe', compact('course', 'liveClass', 'questions', "userID", "classid", "username", 'courses'));
            }

            return view('webinarSinuhe', compact('course', 'liveClass', 'courses'));
        }

        if (!empty($course->live_class)) {
            $liveClass = $course->liveClass()->first()->player()->first();
        } else {
            $liveClass = null;
        }

        $freeClassroom = [];

        $classrooms = Classroom::where('course_id', $course->id)->orderBy('classroom_date', 'asc')->get();

        foreach ($classrooms as $classroom) {
            if ($classroom->free == 1) {
                array_push($freeClassroom, $classroom);
            }
        }

        $booklets = $course->booklets()->get();

        $homeworks = [];
        $handouts = [];
        $answers = [];

        foreach ($booklets as $booklet) {
            switch ($booklet->type) {
                case 'Homework':
                    array_push($homeworks, $booklet);
                    break;

                case 'Handout':
                    array_push($handouts, $booklet);
                    break;

                case 'Answer':
                    array_push($answers, $booklet);
                    break;
            }
        }

        $permission = Permission::find(5);

        if (Auth::check()) {
            if ($course->teacher != auth()->user() && $course->institute != auth()->user() && !auth()->user()->hasPermission($permission)) {

                switch ($course->type) {
                    case 'free':

                        break;
                    case 'login':
                        if (Auth::check()) {
                            if (auth()->user()->hasCourse($course->id)) {
                            } else {
                                $homeworks = [];
                                $handouts = [];
                                $answers = [];
                                $classrooms = $freeClassroom;
                            }
                        } else {
                            $homeworks = [];
                            $handouts = [];
                            $answers = [];
                            $classrooms = $freeClassroom;
                        }
                        break;
                    case 'paid':
                        if (Auth::check()) {
                            if (auth()->user()->hasCourse($course->id)) {
                            } else {
                                $homeworks = [];
                                $handouts = [];
                                $answers = [];
                                $classrooms = $freeClassroom;
                            }
                        } else {
                            $homeworks = [];
                            $handouts = [];
                            $answers = [];
                            $classrooms = $freeClassroom;
                        }
                        break;
                    case 'class':
                        if (Auth::check()) {
                            if (auth()->user()->hasCourse($course->id)) {
                            } else {
                                $homeworks = [];
                                $handouts = [];
                                $answers = [];
                                $classrooms = $freeClassroom;
                            }
                        } else {
                            $homeworks = [];
                            $handouts = [];
                            $answers = [];
                            $classrooms = $freeClassroom;
                        }
                        break;
                }
            }
        } else {
            switch ($course->type) {
                case 'free':

                    break;
                case 'login':
                    $homeworks = [];
                    $handouts = [];
                    $answers = [];
                    $classrooms = $freeClassroom;
                    break;
                case 'paid':
                    $homeworks = [];
                    $handouts = [];
                    $answers = [];
                    $classrooms = $freeClassroom;
                    break;
                case 'class':
                    $homeworks = [];
                    $handouts = [];
                    $answers = [];
                    $classrooms = $freeClassroom;
                    break;
            }
        }
        Verta::setStringformat('d F ');

        foreach ($classrooms as $classroom) {
            $classroom->classroom_date = new Verta($classroom->classroom_date);
        }

        if (!empty($course->live_class)) {

            if (Auth::check()) {
                $userID = Auth::user()->id;
                $firstname = Auth::user()->first_name;
                $lastname = Auth::user()->last_name;
                $username = $firstname . " " . $lastname;
            } else {
                $userID = "0";
                $username = "دانش آموز میهمان";
            }
            if ($course->chat) {
                $questions = $course->liveClass->questions;
            } else {
                $questions = [];
            }
            
            $classid = $course->live_class;

            // if ($liveClass->id == 1 || $liveClass->id == 23 || $liveClass->id == 24 || $liveClass->id == 25 || $liveClass->id == 26) {
            //     return view('webinarPuzzlePlayer', compact('course', 'homeworks', 'handouts', 'answers', 'liveClass', 'questions', "userID", "classid", "username", 'classrooms'));
            // }

            return view('live', compact('course', 'homeworks', 'handouts', 'answers', 'liveClass', 'questions', "userID", "classid", "username", 'classrooms'));
        }

        return view('live', compact('course', 'homeworks', 'handouts', 'answers', 'classrooms','liveClass'));
    }

    public function teacher(User $teacher)
    {
        if ($teacher->hasRole('teacher')) {

            $courses = Course::where('teacher_id', $teacher->id)->where('status', 'public')->paginate(6);

            return view('teacher', compact('teacher', 'courses'));
        } else {
            return redirect()->route('home');
        }
    }

    public function institute(User $institute)
    {
        if ($institute->hasRole('institute')) {

            $courses = Course::where('institute_id', $institute->id)->where('status', 'public')->paginate(6);

            return view('institute', compact('institute', 'courses'));
        } else {
            return redirect()->route('home');
        }
    }

    public function category($category_id)
    {
        $category_name = Category::find($category_id)->name;

        $courses = Category::find($category_id)->courses()->where('status', 'public')->orderBy('created_at', 'desc')->paginate(9);

        return view('category', compact('courses', 'category_name'));
    }

    public function tag($tag_id)
    {
        $tag_name = Tag::find($tag_id)->name;

        $courses = Tag::find($tag_id)->courses()->where('status', 'public')->orderBy('created_at', 'desc')->paginate(9);

        return view('tag', compact('courses', 'tag_name'));
    }

    public function search(Request $request)
    {
        $text = $request['text'];

        $courses = Course::where('status', 'public')->where('name', 'like', "%" . $text . "%")->orWhere('description', 'like', "%" . $text . "%")->paginate(9);

        $path = "search?text=$text";

        $courses->withPath($path);

        return view('search', compact('courses', 'text'));
    }

    public function ajaxsearch(Request $request)
    {
        $text = $request['query'];

        $users = User::where('first_name', 'like', "%" . $text . "%")->orWhere('last_name', 'like', "%" . $text . "%")->orWhere('info', 'like', "%" . $text . "%")->get();
        
        foreach ($users as $key => $user)
            if(!$user->hasRole('institute') && !$user->hasRole('teacher'))
                unset($users[$key]);

        $courses = Course::where('status', 'public')->where('name', 'like', "%" . $text . "%")->orWhere('description', 'like', "%" . $text . "%")->offset(0)->limit(50)->get();

        return view('api.quick_search', compact('courses', 'text', 'users'));
    }

    //Post | for storing messages in database
    public function messagePost(Request $request)
    {
        $text = $request['text'];
        $classid = $request['classid'];
        $userid = $request['userid'];
        if ($userid != 1) {
            if ($userid != 0 ) {
    
                $user = User::findOrFail($userid);
                $firstname = $user->first_name;
                $lastname = $user->last_name;
                $username = $firstname . " " . $lastname;
    
                Question::create([
                    "user_id" => $userid,
                    "classroom_id" => $classid,
                    "name" => $username,
                    "phone" => $user->phone,
                    "text" => $text,
                ]);
            } else {
                $username = $request['name'];
    
                Question::create([
                    // "user_id" => $userid,
                    "classroom_id" => $classid,
                    "name" => $username,
                    "text" => $text,
                ]);
            }
        }
    }

    public function messagePostGuest(Request $request)
    {
        $text = $request['text'];
        $classid = $request['classid'];

        $firstname = $user->first_name;
        $lastname = $user->last_name;
        $username = $firstname . " " . $lastname;

        Question::create([

            "classroom_id" => $classid,
            "name" => $username,
            "phone" => $user->phone,
            "text" => $text,
        ]);
    }

    public function absenceStart(Request $request)
    {

        $classid = $request['classid'];
        $userid = $request['userid'];
        if ($userid != 0) {
            $absence = Absence::create([
                "user_id" => $userid,
                "classroom_id" => $classid,
                "present" => 1,
            ]);
            return response()->json(["absenceid" => $absence->id]);
        }

    }

    public function absenceEnd(Request $request)
    {
        $absenceid = $request['id'];
        if ($absenceid) {
            $absence = Absence::findOrFail($absenceid);
            $absence->present = 0;
            $absence->save();
        }
    }

    public function voice()
    {
        return view('Voice.index');
    }
    public function delete()
    {
        return view('Voice.delete');
    }
    public function save(Request $request,$classid)
    {
        
        $contents = $request->file('audio-blob');
        
        error_log($classid, 0);
        $file = Storage::put("public/voice", $contents);

        $voice = Voice::create([
            'user_id' => auth()->user()->id,
            'path' => $file
        ]);

        $firstname = auth()->user()->first_name;
        $lastname = auth()->user()->last_name;

        $username = $firstname . " " . $lastname;

        $question = Question::create([
            'user_id' => auth()->user()->id,
            "name" => $username,
            "text" => "پیام صوتی",
            "voice_id" =>$voice->id,
            "classroom_id" =>$classid,
            'phone' => auth()->user()->phone
        ]);

        return view('Voice.save');
    }

    public function sinuhe()
    {
        return redirect('/webinar/71');
    }
}