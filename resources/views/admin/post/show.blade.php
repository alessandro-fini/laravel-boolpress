@extends('layouts.app')

@section('title', 'Admin Post Info')

@section('content')
@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
@endif
<div class="container mt-4">
    <div class="card mb-3">
        <div class="card-header">{{ $post->slug }}</div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <img src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title }}" style="max-width:100%">
            <p class="card-text">{{ $post->content }}</p>
            <p class="card-text">Autore: {{ $post->user->name }}</p>
            {{-- <a href="{{ route('post.show', $post->id) }}" class="btn btn-info">Info</a> --}}
        </div>
    </div>
</div>
@endsection