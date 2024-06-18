@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestione Tipologie</h1>
    <a href="{{ route('admin.types.create') }}" class="btn btn-primary mb-3">Aggiungi Tipologia</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($types as $type)
            <tr>
                <td>{{ $type->name }}</td>
                <td>
                    <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-warning">Modifica</a>
                    <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
