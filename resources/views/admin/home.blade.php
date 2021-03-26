@extends('layouts.app')

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
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </li>
</ul>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
