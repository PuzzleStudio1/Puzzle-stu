<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags', compact('tags'));
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

        Tag::create($request->only('name'));

        return back()->with('tagStore', true);
    }

    protected function validateStoreForm($request)
    {
        return $request->validate([
            'name' => ['required'],
        ], [
            'name.required' => 'لطفا نام دسترسی را وارد کنید.',
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return back()->with('tagDelete', true);
    }
}
