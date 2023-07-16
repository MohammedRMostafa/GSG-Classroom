@extends('layouts.master')
@section('title', 'Edit Classroom')
@section('content')

    <h1 class="mb-4">Edit Classroom '{{ $classroom->name }}'</h1>

    <form action="{{ route('classrooms.update', $classroom->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('classrooms._form', [
            'button_lable' => 'Update Classroom',
        ])
    </form>

@endsection
