@extends('layouts.master')
@section('title', 'Create Classrooms')
@section('content')

    <h1 class="mb-4">Create New Classroom</h1>


    <form action="{{ route('classrooms.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('classrooms._form', [
            'button_lable' => 'Create Classroom',
        ])
    </form>
@endsection
