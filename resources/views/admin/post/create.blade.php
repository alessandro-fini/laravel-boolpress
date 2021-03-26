@extends('layouts.app')

@section('title', 'Admin Post Creation')

@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ (Request::route() -> getName() == 'home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (Request::route() -> getName() == 'post.index') ? 'active' : '' }}" href="{{ route('post.index') }}">Visualizza i post</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (Request::route() -> getName() == 'post.create') ? 'active' : '' }}" href="{{ route('post.create') }}">Aggiungi un post</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </li>
</ul>
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
    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="input_title">Title</label>
            <input type="text" class="form-control" id="input_title" name="title">
        </div>
        <div class="form-group">
            <label for="input_content">Content</label>
            <textarea class="form-control" id="input_content" rows="8" name="content"></textarea>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection