@extends('layouts.app')

@section('title', 'Prijava i Registracija')

@section('content')
<h1>Prijava</h1>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Lozinka" required><br><br>
    <button type="submit">Prijavi se</button>
</form>

<br>

<h1>Registracija</h1>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" placeholder="Ime" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Lozinka" required><br><br>
    <input type="password" name="password_confirmation" placeholder="Potvrdi lozinku" required><br><br>
    <button type="submit">Registriraj se</button>
</form>
@endsection
