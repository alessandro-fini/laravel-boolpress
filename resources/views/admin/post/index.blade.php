@extends('layouts.app')

@section('title', 'Admin Post')

@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{ (Request::route() -> getName() == 'home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (Request::route() -> getName() == 'post.index') ? 'active' : '' }}" href="{{ route('post.index') }}">Visualizza i post</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </li>
</ul>
<div class="container mt-4">
    @foreach ($posts as $post)
    <div class="card mb-3">
        <div class="card-header">{{ $post->id }}</div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
    @endforeach
</div>
@endsection