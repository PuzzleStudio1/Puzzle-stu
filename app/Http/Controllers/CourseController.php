<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Exports\CourseUsersExport;
use App\File;
use App\Code;
use App\Imports\UsersImport;
use App\Role;
use App\Services\Uploader\Uploader;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;

class CourseController extends Controller
{
    private $uploader;


    public function __construct(Uploader $uploader)
    {
        $this->uploader = $uploader;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with('teacher', 'institute', 'categories')->orderBy('created_at', 'desc')->paginate(50);

        return view('admin.courseList', compact('courses'));
    }

    public function noneposter()
    {
        $courses = Course::where('photo_id', 1)->with('teacher', 'institute', 'categories')->orderBy('created_at', 'desc')->paginate(50);

        return view('admin.noneposter', compact('courses'));
    }
    
    public function adminSearch(Request $request)
    {
        $text = $request['search'];

        $courses = Course::where('name', 'like', "%" . $text . "%")->orWhere('description', 'like', "%" . $text . "%")->paginate(50);

        return view('admin.courseList', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files = File::all();

        $tags = Tag::all();

        $categories = Category::with('childrenRecursive')->where('parent_id', null)->get();

        $teachers = Role::findOrFail(4)->users;

        $institutes = Role::findOrFail(3)->users;

        return view('admin.courseCreate', compact('tags', 'categories', 'teachers', 'institutes', 'files'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStore($request);

        
        if (!empty($request->file('file'))) {
            $request['file'] = Image::make($request['file'])->resize(380, 380);
            $file = $this->uploader->upload();
            $fileId = $file->id;
            Image::make($_FILES['file']['tmp_name'])->resize(380, 380)->save('storage/image/' . $file->name);
        } else {
            $fileId = 1;
        }

        if ($request['chat'] == 'on') {
            $chat = 1;
        } else {
            $chat = 0;
        }

        if ($request['see_absences'] == 'on') {
            $see_absences = 1;
        } else {
            $see_absences = 0;
        }

        $course = Course::create([
            'name' => $request['name'],
            'type' => $request['type'],
            'teacher_id' => $request['teacher'],
            'institute_id' => $request['institute'],
            'description' => $request['description'],
            'price' => $request['price'],
            'discount_price' => $request['discount_price'],
            'status' => $request['status'],
            'chat' => $chat,
            'see_absences' => $see_absences,
            'photo_id' => $fileId,
        ]);

        $course->giveTagsTo($request->tags);

        $course->giveCategoriesTo($request->categories);

        $course->save();

        return redirect()->route('course.index')->with('success', true);
    }

    protected function validateStore($request)
    {
        $request->validate(
            [
                'name' => ['required', 'string'],
                'type' => ['required'],
                'teacher' => ['required'],
                'institute' => ['required'],
                'categories' => ['required'],
                'description' => ['required', 'string'],
                'status' => ['required'],
                'file' => ['file', 'mimetypes:image/jpeg,video/mp4,application/zip,application/pdf,image/png']
            ],
            [
                'name.required' => 'لطفا نام دوره را وارد کنید.',
                'type.required' => 'لطفا نوع دوره را انتخاب نمایید.',
                'teacher.required' => 'لطفا معلم دوره راانتخاب نمایید.',
                'institute.required' => 'لطفا برگزار کننده دوره را انتخاب نمایید.',
                'categories.required' => 'لطفا دسته بندی دوره را انتخاب نمایید.',
                'description.required' => 'لطفا توضیحات دوره را وارد کنید.',
                'file.mimetypes' => 'شما فقط میتوانید فرمت های jpeg,mp4,zip,pdf را آپلود کنید .',
                'status.required' => 'لطفا وضعیت دوره را مشخص نمایید.',
            ]
        );
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $files = File::all();

        $tags = Tag::all();

        $categories = Category::with('childrenRecursive')->where('parent_id', null)->get();

        $teachers = Role::findOrFail(4)->users;

        $institutes = Role::findOrFail(3)->users;

        return view('admin.courseEdit', compact('course', 'files', 'tags', 'categories', 'teachers', 'institutes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->validateUpdate($request);

        if ($request['chat'] == 'on') {
            $chat = 1;
        } else {
            $chat = 0;
        }

        if ($request['see_absences'] == 'on') {
            $see_absences = 1;
        } else {
            $see_absences = 0;
        }
        
        if ($request['limited'] == 'on') {
            $limited = true;
        } else {
            $limited = false;
        }

        $course->update([
            'name' => $request['name'],
            'type' => $request['type'],
            'teacher_id' => $request['teacher'],
            'institute_id' => $request['institute'],
            'description' => $request['description'],
            'price' => $request['price'],
            'discount_price' => $request['discount_price'],
            'status' => $request['status'],
            'chat' => $chat,
            'limited' => $limited,
            'see_absences' => $see_absences
        ]);

        if ($request->file('file') !== null) {

            $oldFile = $course->photo;

            $file = $this->uploader->upload();

            Image::make($_FILES['file']['tmp_name'])->resize(380, 380)->save('storage/image/' . $file->name);

            $course->update([
                'photo_id' => $file->id,
            ]);

            if ($course->photo_id != 1) {
                $oldFile->delete();
            }
        }

        $course->giveTagsTo($request->tags);

        $course->giveCategoriesTo($request->categories);

        $course->save();

        return redirect()->route('course.index')->with('success', true);
    }

    protected function validateUpdate($request)
    {
        $request->validate(
            [
                'name' => ['required', 'string'],
                'type' => ['required'],
                'teacher' => ['required'],
                'institute' => ['required'],
                'categories' => ['required'],
                'description' => ['required', 'string'],
                'status' => ['required'],
            ],
            [
                'name.required' => 'لطفا نام دوره را وارد کنید.',
                'type.required' => 'لطفا نوع دوره را انتخاب نمایید.',
                'teacher.required' => 'لطفا معلم دوره راانتخاب نمایید.',
                'institute.required' => 'لطفا برگزار کننده دوره را انتخاب نمایید.',
                'categories.required' => 'لطفا دسته بندی دوره را انتخاب نمایید.',
                'description.required' => 'لطفا توضیحات دوره را وارد کنید.',
                'status.required' => 'لطفا وضعیت دوره را مشخص نمایید.',
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        if (empty($course->liveClass)) {
            $booklets = $course->booklets;

            foreach ($booklets as $booklet) {

                $booklet->file->delete();
            }

            $course->delete();

            if ($course->photo_id != 1) {
                $course->photo->delete();
            }

            return back()->with('success', true);
        } else {

            return back()->with('classroom is live', true);
        }
    }

    public function courseCodeList(Course $course)
    {
        $codes = $course->codes;
        return view('admin.codeList', compact('course', 'codes'));
    }

    public function courseStudentList(Course $course)
    {
        $users = $course->users;
        return view('admin.studentList', compact('course', 'users'));
    }

    public function deleteStudent(Course $course)
    {
        $users = $course->users;

        $course->users()->detach($users);

        return view('admin.studentList', compact('course', 'users'));
    }

    public function deleteCode(Course $course)
    {
        $delete_codes = Code::where('course_id', $course->id)->delete();

        return back()->with('success', true);
    }

    public function courseStudentDeleteAdmin(Course $course, User $user)
    {
        $course->users()->detach($user);

        return back()->with('success', true);
    }
    public function courseStudentDelete(Course $course, User $user)
    {
        $authuser = auth()->user();

        if ($course->teacher_id == $authuser->id || $course->institute_id == $authuser->id) {

            $course->users()->detach($user);

            return back()->with('success', true);
        } else {
            return back();
        }
    }

    protected function courseStudentAddValidate($request)
    {
        $request->validate(
            [
                'phone' => ['required'],
            ],
            [
                'phone.required' => 'لطفا شماره دانش آموز مورد نظر را وارد نمایید.',
            ]
        );
    }

    public function courseStudentCreate(Course $course, Request $request)
    {
        $input = $request['newUsers'];

        $usersContent = explode("\n", str_replace("\r", "", $input));

        $user = auth()->user();

        if ($course->teacher_id == $user->id || $course->institute_id == $user->id) {

            foreach ($usersContent as $userContent) {

                $content = explode("|", $userContent);

                $user_exists = User::where('phone', $content[2])->first();

                if ($user_exists == null) {

                    if (strlen($content[2]) == 11) {
                        $user = User::create([
                            'first_name' => $content[0],
                            'last_name' => $content[1],
                            'phone' => $content[2],
                        ]);

                        $user->is_verify = true;

                        $user->save();

                        $course->users()->attach($user);
                    } else {

                        return back()->with('phone number must be 11 digit', true);
                    }
                } else {
                    $course->users()->syncWithoutDetaching($user_exists);
                }
            }
            return back()->with('success', true);
        } else {
            return back();
        }
    }

    public function courseCodeCreateAdmin(Course $course, Request $request)
    {
        $input = $request['newCodes'];
        $errors = [];

        $CodesContent = explode("\n", str_replace("\r", "", $input));

        foreach ($CodesContent as $CodeContent) {

            $user_exists = Code::where('code', $CodeContent)->where('course_id', $course->id)->first();

            if ($user_exists == null) {

                if (strlen($CodeContent) == 19) {
                    $code = Code::create([
                        'code' => $CodeContent,
                        'course_id' => $course->id,
                        'user_id' => null
                    ]);
                } else {

                    return back()->with('code number must be 19 digit', true);
                }
            } else {
                array_push($errors, $CodeContent);
            }
        }
        if(count($errors) > 0)
            return back()->withErrors('عملیات با موفقیت انجام شد اما برخی کد ها از قبل وجود داشتند:<br>'. join(', ', $errors) );
        else {
            return back()->with('success', true);
        }
    }

    public function courseStudentCreateAdmin(Course $course, Request $request)
    {
        $input = $request['newUsers'];

        $usersContent = explode("\n", str_replace("\r", "", $input));

        foreach ($usersContent as $userContent) {

            $content = explode("|", $userContent);

            $user_exists = User::where('phone', $content[2])->first();

            if ($user_exists == null) {

                if (strlen($content[2]) == 11) {
                    $user = User::create([
                        'first_name' => $content[0],
                        'last_name' => $content[1],
                        'phone' => $content[2],
                    ]);

                    $user->is_verify = true;

                    $user->save();

                    $course->users()->attach($user);
                } else {

                    return back()->with('phone number must be 11 digit', true);
                }
            } else {
                $course->users()->syncWithoutDetaching($user_exists);
            }
        }
        return back()->with('success', true);
    }

    public function importUser(Request $request, Course $course)
    {
        $this->importUserValidate($request);

        try {
            Excel::import(new UsersImport($course), request()->file('file'));
        } catch (\TypeError $ex) {
            // return back()->with('AdminImportPhoneExists',"شماره تلفن {$row[2]}در سامانه موجود است.");
            return back()->with('file wrong', true);
        }

        return back()->with('success', true);
    }

    protected function importUserValidate($request)
    {
        $request->validate(
            [
                'file' => ['required', 'file'],
            ],
            [
                'file.required' => 'لطفا فایل را انتخاب کنید.',
            ]
        );
    }

    public function signLoginCourse(Course $course)
    {
        $user = auth()->user();

        if (Auth::check() && $course->type == 'login' && !auth()->user()->hasCourse($course->id)) {
            
            $course->users()->attach($user);

            return back();
        } else {
            return redirect()->route('webinar.frontend', $course->id);
        }
    }

    public function CodeLoginCourse(Course $course, Request $request)
    {
        $user = auth()->user();

        $access_code = $request->access_code;

        if (Auth::check() && $course->type == 'code' && auth()->user()->hasCourse($course->id))
        {
            return back();
        }

        if (Auth::check() && $course->type == 'code') {
            $check_code = Code::where('code', $access_code)->where('course_id', $course->id)->where('user_id', null)->first();

            if($check_code != null)
            {
                $access_done = Code::where('code', $access_code)->where('course_id', $course->id)->update(array('user_id' => $user->id));
                $course->users()->attach($user);
                return back();
            }
            else {
                return back()->with('invalid code', true);
            }

        } else {
            return back();
        }
    }

    public function courseStudent(Course $course)
    {
        return (new CourseUsersExport($course))->download($course->id . '_students.xlsx');
    }

    public function complete(Course $course)
    {
        $course->booklets()->delete();
        $course->users()->detach();
        $course->classrooms()->delete();
        return back()->with('success', true);
    }

    public function sinuheSign()
    {
        $courses = Tag::findOrFail(3)->courses()->orderBy('created_at', 'desc')->get();
        $sinuhe = Course::findOrFail(71);

        if (Auth::check()) {

            auth()->user()->courses()->syncWithoutDetaching($courses);
            auth()->user()->courses()->syncWithoutDetaching($sinuhe);

            return back()->with('success', true);
        } else {

            return back()->with('danger', true);
        }
    }

    public function CodeLoginSinuhe(Course $course, Request $request)
    {
        $user = auth()->user();

        $access_code = $request->access_code;

        if (Auth::check() && $course->type == 'code' && auth()->user()->hasCourse($course->id))
        {
            return back();
        }

        if (Auth::check() && $course->type == 'code') {
            $check_code = Code::where('code', $access_code)->where('course_id', $course->id)->where('user_id', null)->first();

            if($check_code != null)
            {
                $access_done = Code::where('code', $access_code)->where('course_id', $course->id)->update(array('user_id' => $user->id));
                
                $courses = Tag::findOrFail(3)->courses()->orderBy('created_at', 'desc')->get();
                $sinuhe = Course::findOrFail(71);
                auth()->user()->courses()->syncWithoutDetaching($courses);
                auth()->user()->courses()->syncWithoutDetaching($sinuhe);

                return back();
            }
            else {
                return back()->with('invalid code', true);
            }

        } else {
            return back();
        }
    }
}
