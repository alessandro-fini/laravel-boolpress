@extends('layouts.app')

@section('title', 'Pagina contatti')

@section('content')
    <div class="container">
        <form action="{{ route('guest.contacts.email') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="input_name">Nome</label>
                <input type="text" class="form-control" id="input_name" name="name">
            </div>
            <div class="form-group">
                <label for="input_mail">Indirizzo email</label>
                <input type="email" class="form-control" id="input_mail" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="input_message">Inserisci il messaggio</label>
                <textarea class="form-control" id="input_message" rows="5" name="message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection