@extends('layouts.app')

@section('title', 'Tutti i post')

@section('content')
<div class="container">
    @foreach ($posts as $post)
    <div class="card mb-4">
        <div class="card-header">{{ $post->id }}</div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <a href="{{ route('guest.post.show', $post->slug) }}" class="btn btn-primary">Info</a>
        </div>
    </div>
    @endforeach
</div>
@endsection