@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Latest single blog -->
        <div class="col-md-8">
            @if($latest_blog)
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $latest_blog->image) }}" class="card-img-top"
                        alt="{{ $latest_blog->title }}">
                    <div class="card-body">
                        <h2 class="card-title">{{ $latest_blog->title }}</h2>
                        <p class="card-text text-muted">Posted on {{ $latest_blog->created_at->format('F d, Y') }}</p>
                        <p class="card-text">{{ Str::limit($latest_blog->content, 150) }}</p>
                        <a href="{{ route('blog.show', $latest_blog->id) }}" class="btn btn-primary float-end">Read More</a>
                    </div>
                </div>
            @else
                <div class="text-center align-items-center">
                    <p>No blogs available.</p>
                </div>
            @endif
        </div>

        <!-- 10 latest blogs -->
        <div class="col-md-4">
            <h4 class="mb-4 d-flex justify-content-between align-items-center">
                <span>Latest Blogs</span>
                <a href="{{ route('blog.create') }}" class="btn btn-primary">Write a Blog</a>
            </h4>
            <ul class="list-group">
                @foreach($blogs as $blog)
                    <li class="list-group-item d-flex align-items-center mb-4 rounded">
                        <!-- Blog Image -->
                        <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}" class="img-thumbnail me-3"
                            style="width: 60px; height: 60px; object-fit: cover;">

                        <!-- Blog Title and Date -->
                        <div>
                            <a href="{{ route('blog.show', $blog->id) }}"
                                class="fw-bold text-decoration-none">{{ $blog->title }}</a>
                            <br>
                            <small class="text-muted">{{ $blog->created_at->format('F d, Y') }}</small>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection