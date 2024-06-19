@extends('layouts.admin')

@section('title', 'Edit technology: ' . $technology->name)

@section('content')
    <section>
        <div class="d-flex justify-content-between align-items-center py-4">
            <h2>Edit technology: {{$technology->name}}</h2>
            <a href="{{route('admin.technologies.show', $technology->slug)}}" class="btn btn-danger">Show technology</a>
        </div>

        <form action="{{ route('admin.technologies.update', $technology->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $technology->name) }}" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div id="nameHelp" class="form-text text-white">Insert min 3 and max 200 letters</div>
            </div>


            <div class="mb-3">
                <button type="submit" class="btn btn-danger">Save</button>
                <button type="reset" class="btn btn-secondary">Reset</button>

            </div>
        </form>


    </section>
   @include('partials.editor')

@endsection