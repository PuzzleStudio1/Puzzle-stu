<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\User;
use App\Role;
use App\Course;
use App\Category;
use DB;

class SitemapController extends Controller
{
    public function sitemap()
    {
        return response()->view('sitemap.sitemap')->header('Content-Type','text/xml');
    }

    public function pages()
    {
        return response()->view('sitemap.pages')->header('Content-Type','text/xml');
    }

    public function course()
    {
        $courses=Course::all();
        return response()->view('sitemap.course',compact('courses'))->header('Content-Type','text/xml');
    }

    public function category()
    {
        $categories=Category::all();
        return response()->view('sitemap.category',compact('categories'))->header('Content-Type','text/xml');
    }

    public function tag()
    {
        $tags=Tag::all();
        return response()->view('sitemap.tag',compact('tags'))->header('Content-Type','text/xml');
    }

    public function teacher()
    {
        $institutes=Role::where('id','3')->with('users')->first();
        $institutes=$institutes->users;
        $teachers=Role::where('id','4')->with('users')->first();
        $teachers=$teachers->users;

        return response()->view('sitemap.teacher',compact('institutes','teachers'))->header('Content-Type','text/xml');
    }
}