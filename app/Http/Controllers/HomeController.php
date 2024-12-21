<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $blogs = Blog::latest()->take(5)->get();
        $latest_blog = Blog::latest()->first();
        return view('home', compact('blogs', 'latest_blog'));
    }
}
