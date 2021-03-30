@extends('layouts.app')

@section('title', 'Dettaglio post')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Autore: {{ $post->user->name }}</div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <img src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title }}" style="max-width:100%">
            <p class="card-text">{{ $post->content }}</p>
            <p class="card-text">
                @foreach ($tags as $tag)
                <div>{{ $tag->name }}</div>
                @endforeach
            </p>
            <p class="card-text">Autore: {{ $post->user->name }}</p>
        </div>
    </div>
</div>
@endsection