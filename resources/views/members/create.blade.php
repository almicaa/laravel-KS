@extends('layouts.app')

@section('content')
    <h1>Dodaj novog člana</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('members.store') }}">
        @csrf
        <label>Ime psa:</label>
        <input type="text" name="ime" required>

        <label>Pasmina:</label>
        <input type="text" name="pasmina" required>

        <label>Dob (godine):</label>
        <input type="number" name="dob" required min="0">

        <label>Boja:</label>
        <input type="text" name="boja" required>

        <button type="submit">Dodaj psa</button>
    </form>

    <a href="{{ route('members.index') }}" class="button">Nazad na listu članova</a>
@endsection
