@extends('layouts.master')
@section('title', 'Create Topic')
@section('content')

    <h1 class="mb-4">Create New Topic</h1>


    <form action="{{ route('topics.store') }}" method="post">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="name" name="name" placeholder="name"
                value="{{ old('name') }}">
            <label for="name">Topic Name</label>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="classroom_id">Classroom</label>
            <select @class(['form-control', 'is-invalid' => $errors->has('classroom_id')]) id="classroom_id" name="classroom_id">
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                @endforeach
            </select>
            @error('classroom_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex col-3">
            <button type="submit" class="mx-1 btn btn-primary">Create Topic</button>
            <a href="{{ route('topics.index') }}" class="btn btn-primary">Home</a>
        </div>
    </form>
@endsection
