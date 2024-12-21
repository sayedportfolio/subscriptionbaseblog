@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Latest single blog -->
        <div class="col-md-8">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-12">
                        <div class="card mb-4">
                            <div class="row g-0">
                                <!-- Left Side: Image -->
                                <div class="col-md-6">
                                    <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid rounded-start"
                                        alt="{{ $blog->title }}">
                                </div>

                                <!-- Right Side: Content -->
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $blog->title }}</h5>
                                        <p class="card-text">{{ Str::limit($blog->content, 200) }}</p>
                                        <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-primary float-end">Read
                                            More</a>
                                        <div class=" clearfix"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="container text-center mt-4">
                <div class="d-flex justify-content-center">
                    {!! $blogs->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>

        <!-- 10 latest blogs -->
        <div class="col-md-4">
            <h4 class="mb-4 d-flex justify-content-between align-items-center">
                <span>Latest Blogs</span>
                <a href="{{ route('blog.create') }}" class="btn btn-primary">Write a Blog</a>
            </h4>
            <ul class="list-group">
                @foreach($blogs as $blog)
                    <li class="list-group-item d-flex align-items-center rounded mb-4">
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