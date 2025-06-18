@extends('layouts.app')

@section('content')
    <h1>Lista članova</h1>
    <a href="{{ route('members.create') }}" class="button">Dodaj novog člana</a>

    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ime psa</th>
                <th>Pasmina</th>
                <th>Dob</th>
                <th>Boja</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->ime }}</td>
                <td>{{ $member->pasmina }}</td>
                <td>{{ $member->dob }}</td>
                <td>{{ $member->boja }}</td>
                <td>
                    <form action="{{ route('members.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Jeste li sigurni?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Obriši</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
