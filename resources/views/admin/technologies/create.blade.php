@extends('layouts.admin')

@section('title', 'Create Technology')

@section('content')
    <section>
        <h2>Create a new Technology</h2>
        <form action="{{ route('admin.technologies.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Title</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div id="nameHelp" class="form-text text-white">Insert min 3 and max 200 letters</div>
            </div>


            <div class="mb-3">
                <button type="submit" class="btn btn-danger">Create</button>
                <button type="reset" class="btn btn-secondary">Reset</button>

            </div>
        </form>


    </section>
    <!-- nice editor nel content si inserisce i punti esclamativi -->
   @include('partials.editor')

@endsection