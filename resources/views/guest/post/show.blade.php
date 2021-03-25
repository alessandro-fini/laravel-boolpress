@extends('layouts.app')

@section('title', 'Dettaglio post')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Autore: {{ $post->user->name }}</div>
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
        </div>
    </div>
</div>
@endsection