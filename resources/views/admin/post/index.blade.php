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
        <a class="nav-link {{ (Request::route() -> getName() == 'post.create') ? 'active' : '' }}" href="{{ route('post.create') }}">Aggiungi un post</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ (Request::route() -> getName() == 'user.profile') ? 'active' : '' }}" href="{{ route('user.profile') }}">Profilo utente</a>
    </li>
</ul>
@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
@endif
<div class="container mt-4">
    @foreach ($posts as $post)
    <div class="card mb-3">
        <div class="card-header">{{ $post->id }}</div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <a href="{{ route('post.show', $post->id) }}" class="btn btn-info">Info</a>
            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-success">Edit</a>
            <form action="{{ route('post.destroy', $post->id) }}" class="d-inline-block" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection