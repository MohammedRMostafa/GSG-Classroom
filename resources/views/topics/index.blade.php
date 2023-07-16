@extends('layouts.master')
@section('title', 'Topics')
@section('content')

    <h1 class="mb-4">Topics</h1>

    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Classroom</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 1; ?>
                @foreach ($topics as $topic)
                    <tr>
                        <th>{{ $index++ }}</th>
                        <td>{{ $topic->name }}</td>
                        <td>{{ $topic->classroom->name }}</td>
                        <td>
                            <div class="d-flex">
                                {{-- <a href="{{ route('topics.show', $topic->id) }}" class="btn btn-primary">View</a> --}}
                                <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-dark mx-1">Edit</a>
                                <form action="{{ route('topics.destroy', $topic->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('topics.create') }}" class="col-1 mx-0 mt-3 btn btn-success">Add</a>

@endsection
