@extends('layouts.master')
@section('title', 'Classrooms')
@section('content')

    <h1 class="mb-4">Classrooms</h1>

    <div class="row">
        @foreach ($classrooms as $classroom)
            <div class="col-md-3">
                <div class="card mb-4">
                    @if ($classroom->cover_image_path)
                        <img src=" storage/{{ $classroom->cover_image_path }}" class="card-img-top img-fluid img-thumbnail"
                            alt="">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $classroom->name }}</h5>
                        <p class="card-text">{{ $classroom->section }} - {{ $classroom->room }}</p>
                        <div class="d-flex">
                            <a href="{{ route('classrooms.show', $classroom->id) }}" class="btn btn-primary">View</a>
                            <a href="{{ route('classrooms.edit', $classroom->id) }}" class="btn btn-dark mx-1">Edit</a>
                            <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{ route('classrooms.create') }}" class="col-1 mx-2 mt-3 btn btn-success">Add</a>
@endsection
