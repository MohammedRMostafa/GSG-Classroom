<x-app-layout>

    <x-slot:title>Edit Topic</x-slot:title>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h1 class="mb-4">Edit Topic</h1>

                <form action="{{ route('classroom.topics.update', [$topic->id, $classroom]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-floating mb-3">
                        <input type="text" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="name" name="name" placeholder="name"
                            value="{{ old('name', $topic->name) }}">
                        <label for="name">Topic Name</label>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div class="form-group mb-3">
                        <label for="classroom_id">Classroom</label>
                        <select @class(['form-control', 'is-invalid' => $errors->has('classroom_id')]) id="classroom_id" name="classroom_id">
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}"
                                    @if ($classroom->id == $topic->classroom_id) @selected(true) @endif>
                                    {{ $classroom->name }}</option>
                            @endforeach
                        </select>
                        @error('classroom_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    <div class="d-flex col-3">
                        <button type="submit" class="mx-1 btn btn-outline-success">Update Topic</button>
                        <a href="{{ route('classroom.topics.index', $classroom) }}"
                            class="btn btn-outline-primary">Home</a>
                    </div>
                </form>


            </div>
        </div>
    </div>
</x-app-layout>
