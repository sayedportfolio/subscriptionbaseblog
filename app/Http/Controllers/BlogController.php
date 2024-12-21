<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(10);
        $latest_post = Blog::latest()->first();
        return view('blogs.index', compact('blogs', 'latest_post'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        try {
            DB::beginTransaction();
            Blog::create([
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => auth()->user()->id,
                'image' => $imagePath
            ]);
            DB::commit();
            return redirect('blogs');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors($e->getMessage());
        }
    }

    public function update(Blog $blog)
    {
        dd($blog);
    }

    public function delete(Blog $blog)
    {
        dd($blog);
    }
}
