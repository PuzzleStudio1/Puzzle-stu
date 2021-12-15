<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('childrenRecursive')->where('parent_id', null)->get();

        return view('admin.categoryList', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->parent_id = "0") {
            
            dd($request);
        };
        $this->validateStoreForm($request);

        Category::create($request->only('name','parent_id'));

        return back()->with('categoryStore',true);
    }

    protected function validateStoreForm($request)
    {
        return $request->validate([
            'name'=>['required']
        ],[
            'name.required'=>'لطفا نام دسته بندی را وارد کنید.'
        ]
    );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::with('childrenRecursive')->where('parent_id', null)->get();

        return view('admin.categoryEdit',compact(['category','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validateUpdateForm($request);

        $category->update($request->only('name','parent_id'));

        return redirect()->route('categories.index')->with('success',true);
    }

    public function validateUpdateForm($request)
    {
        return $request->validate([
            'name'=>['required'],
        ],[
            'name.required'=>'لطفا نام نقش را وارد کنید.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return back()->with('success',true);
    }
}
