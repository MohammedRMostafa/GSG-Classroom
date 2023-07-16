@extends('layouts.master')
@section('title', $classroom->name)
@section('content')

    <div class="container border border-light bg-light py-3 px-5">
        <div class="col-12 d-flex justify-content-center">
            @if ($classroom->cover_image_path)
                <img src="{{ Storage::disk('public')->url($classroom->cover_image_path) }}"
                    style="  border: 1px solid #ddd; border-radius: 20px; padding: 5px; width: 1000px; max-height: 500px;margin-bottom: 10px">
            @endif
        </div>
        <h1 class="mb-4">{{ $classroom->name }}</h1>
        <h3>{{ $classroom->section }}</h3>

        <div class="row">
            <div class="col-md-3">
                <div class="border rounded p-3 text-center">
                    <span class="text-success fs-2">{{ $classroom->code }}</span>
                </div>
            </div>
            <div class="col-md-9"></div>

        </div>
    </div>
@endsection
