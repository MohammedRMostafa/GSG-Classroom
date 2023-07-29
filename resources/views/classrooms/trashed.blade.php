<x-app-layout>

    <x-slot:title>Trashed Classrooms</x-slot:title>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <x-messages />
                <h1 class="mb-4">Trashed Classrooms</h1>
                <div class="row">
                    @foreach ($classrooms as $classroom)
                        <div class="col-md-3">
                            <div class="card mb-4">
                                @if ($classroom->cover_image_path)
                                    <img src="{{ asset('storage/' . $classroom->cover_image_path) }}"
                                        class="card-img-top img-fluid img-thumbnail" alt="">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $classroom->name }}</h5>
                                    <p class="card-text mb-2">{{ $classroom->section }} - {{ $classroom->room }}</p>
                                    <div class="d-flex">
                                        <form action="{{ route('classroom.trashed.restore', $classroom->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-outline-success mx-1">restore</button>
                                        </form>
                                        <form action="{{ route('classroom.trashed.force-deletes', $classroom->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger mx-1">delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="{{ route('classrooms.index') }}" class="col-1 mx-2 mt-3 btn btn-success">Home</a>

            </div>
        </div>
    </div>
</x-app-layout>
