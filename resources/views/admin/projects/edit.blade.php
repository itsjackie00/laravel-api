@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifica Progetto</h1>
    <div class="mb-3">
        <label for="type_id" class="form-label">Tipologia</label>
        <select name="type_id" class="form-control" id="type_id">
            <option value="">Seleziona Tipologia</option>
            @foreach($types as $type)
            <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>
                {{ $type->name }}
            </option>
            @endforeach
        </select>
    </div>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $project->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" class="form-control" id="description" rows="5" required>{{ $project->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <input type="file" name="image" class="form-control" id="image">
            @if($project->image)
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="img-thumbnail mt-2" width="150">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Salva</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Annulla</a>
    </form>
    <div class="mb-3">
        <label for="technologies" class="form-label">Tecnologie</label>
        {{--@foreach($technologies as $technology)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="technologies[]" value="{{ $technology->id }}" id="technology-{{ $technology->id }}" @if($project->technologies->contains($technology->id)) checked @endif>
            <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
        </div>
        @endforeach
    </div>--}}

</div>
@endsection