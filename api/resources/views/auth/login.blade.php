@extends('layouts.global')

@section('title', 'Login')

@section('content')

    <h1>Faça login no sistema</h1>

    <form action="{{ route('logged') }}" method="post" class="form">
        @csrf
        <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Senha" value="{{ old('password') }}">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password_confirmation" placeholder="Confirma a Senha" value="{{ old('password_confirmation') }}">
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">enviar</button>
        </div>
    </form>

@endsection
