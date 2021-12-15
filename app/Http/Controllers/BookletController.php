<?php

namespace App\Http\Controllers;

use App\Booklet;
use App\Course;
use App\Services\Uploader\Uploader;
use Illuminate\Http\Request;

class BookletController extends Controller
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
        $booklets = Booklet::with('course','file')->get();

        $courses = Course::all();
        
        return view('admin.bookletList',compact('booklets','courses'));
    }

    public function indexCourse(Course $course)
    {
          return view('admin.bookletCourseList',compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStoreForm($request);

        $file = $this->uploader->upload();

        Booklet::create([
            'name' => $request['name'],
            'type' => $request['type'],
            'file_id' => $file->id,
            'description' => $request['description'],
            'course_id' => $request['course_id'],
        ]);

        return back()->with('success', true);
    }

    protected function validateStoreForm($request)
    {
        return $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'course_id' => ['required'],
            'file' => ['required', 'file', 'mimetypes:image/jpeg,video/mp4,application/zip,application/pdf,image/png']

        ], [
            'name.required' => 'لطفا نام را وارد کنید.',
            'type.required' => 'لطفا نوع را انتخاب کنید.',
            'course_id.required' => 'لطفا دوره مربوطه را انتخاب نمایید.',
            'file.required'=>'لطفا فایل مورد نظر را انتخاب کنید.',
            'file.mimetypes'=>'شما فقط میتوانید فرمت های jpeg,mp4,zip,pdf را آپلود کنید .'
        ]);
    }

    public function courseStore(Request $request,Course $course)
    {
        $this->validateCourseStoreForm($request);

        $file = $this->uploader->upload();

        Booklet::create([
            'name' => $request['name'],
            'type' => $request['type'],
            'description' => $request['description'],
            'course_id' => $course->id,
            'file_id' => $file->id
        ]);

        return back()->with('success', true);
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
            'file.required'=>'لطفا فایل مورد نظر را انتخاب کنید.',
            'file.mimetypes'=>'شما فقط میتوانید فرمت های jpeg,mp4,zip,pdf را آپلود کنید .'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booklet $booklet)
    {
        $booklet->delete();
        
        $file = $booklet->file();

        $file->delete();

        return back()->with('success', true);

    }
}
