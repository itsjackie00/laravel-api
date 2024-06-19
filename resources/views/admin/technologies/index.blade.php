@extends('layouts.admin')
@section('title', 'technologies')

@section('content')
    <section class="container">
        <!-- message delete/create -->
        @if(session()->has('message'))
        <div class="alert alert-success">{{session()->get('message')}}</div>
        @endif
        <!-- title -->
        <div class="d-flex justify-content-between align-items-center py-4">
            <h1 class="text-uppercase fw-bold">technologies</h1>
            {{--<a href="{{route('admin.technologies.create')}}" class="btn btn-primary">New project</a>--}}
        </div>
        <!-- Table -->
        <table class="table table-hover overflow-x-scroll">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col"> Created At</th>
                <th scope="col">Update At</th>
                <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($technologies as $technology)
                <tr>
                <td>{{$technology->id}}</td>
                <td>{{$technology->name}}</td>
                <td>{{$technology->slug}}</td>
                <td>{{$technology->create_at}}</td>
                <td>{{$technology->update_at}}</td>
                <!-- Actions -->
                <td>
                    <a href="{{route('admin.technologies.show', $technology->slug)}}" class="text-black" title="show"><i class="fa-solid fa-eye"></i></a>
                    <a href="{{route('admin.technologies.edit', $technology->slug)}}" class="link-success" title="edit"><i class="fa-solid fa-pen"></i></a>
                    <!-- Delete -->
                    <form action="{{route('admin.technologies.destroy', $technology->slug)}}" method="POST" class="d-inline-block">
                    @csrf
                    @method('Delete')
                    <button type="submit" class="delete-button border-0 bg-transparent text-danger" data-item-title="{{$technology->name}}" data-item-id = "{{ $technology->id }}">
                    <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
                    
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
   {{-- {{ $technologies->links('vendor.pagination.bootstrap-5')}}--}}
    @include('partials.modal-delete')
@endsection
