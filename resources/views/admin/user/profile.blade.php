@extends('layouts.app')

@section('title', 'Profilo utente')

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
    <li class="nav-item">
        <a class="nav-link {{ (Request::route() -> getName() == 'user.profile') ? 'active' : '' }}" href="{{ route('user.profile') }}">Profilo utente</a>
    </li>
</ul>
<div class="container d-flex justify-content-center">
    <div class="card mt-4" style="width: 25rem;">
        <div class="card-header">
            <h3>Dati utente</h3>
        </div>
        <ul class="list-group list-group-flush">
            {{-- grazie ad auth ed al metodo user possiamo recuperare i dati dell'utente autenticato --}}
            <li class="list-group-item">{{ Auth::user()->name }}</li>
            <li class="list-group-item">{{ Auth::user()->email }}</li>
            <li class="list-group-item">
                @if (Auth::user()->api_token)
                    {{ Auth::user()->api_token }}
                @else
                    <form action="{{ route('token-gen') }}" method="POST">
                        @csrf
                        @method('POST')
                        <button class="btn btn-success">Genera token api</button>
                    </form>
                @endif
            </li>
        </ul>
    </div>
</div>
@endsection