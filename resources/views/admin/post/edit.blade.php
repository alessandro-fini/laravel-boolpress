@extends('layouts.app')

@section('title', 'Admin Post Creation')

@section('content')
<div class="container mt-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="input_title">Title</label>
            <input type="text" class="form-control" id="input_title" name="title" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="input_content">Content</label>
            <textarea class="form-control" id="input_content" rows="8" name="content">{{ $post->content }}</textarea>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection