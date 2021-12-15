<?php

namespace App\Http\Controllers;

use App\File;
use App\Services\Uploader\Uploader;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * @var Uploader
     */
    private $uploader;



    public function __construct(Uploader $uploader)
    {
        $this->uploader = $uploader;

    }

    public function index()
    {
        $files = File::all();

        return view('admin.fileIndex', compact('files'));
    }

    public function show(File $file)
    {
        return $file->download();
    }

    public function create()
    {
        return view('admin.fileCreate');
    }

    public function delete(File $file)
    {

        $file->delete();

        return back()->with('success',true);

    }


    public function new(Request $request)
    {
        $this->validateFile($request);

        $response = $this->uploader->upload();

        if ($response == false) {
            
            return back()->with('file has exists',true);

        }
        
        return redirect()->back()->withSuccess('File has uploaded successfully');
        // try{
        // }catch(\Exception $e){

        //     return redirect()->back()->withError($e->getMessage());
        // }
    }


    private function validateFile($request)
    {
        $request->validate([
            // 'file' => ['required', 'file']
            'file' => ['required', 'file', 'mimetypes:image/jpeg,video/mp4,application/zip,application/pdf,image/png,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']
        ],[
            'file.required'=>'لطفا فایل مورد نظر را انتخاب کنید.',
            'file.mimetypes'=>'شما فقط میتوانید فرمت های jpeg,mp4,zip,excel,powerpoint,pdf را آپلود کنید .'
        ]);
    }
}
