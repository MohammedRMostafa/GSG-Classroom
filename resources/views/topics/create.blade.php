<x-app-layout>

    <x-slot:title>Create Topic</x-slot:title>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <h1 class="mb-4">Create New Topic</h1>


                <form action="{{ route('topics.store') }}" method="post">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="name" name="name" placeholder="name"
                            value="{{ old('name') }}">
                        <label for="name">Topic Name</label>
                        <x-error field-name="name" />

                    </div>

                    <div class="form-group mb-3">
                        <label for="classroom_id">Classroom</label>
                        <select @class(['form-control', 'is-invalid' => $errors->has('classroom_id')]) id="classroom_id" name="classroom_id">
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                            @endforeach
                        </select>
                        <x-error field-name="classroom_id" />
                    </div>

                    <div class="d-flex col-3">
                        <button type="submit" class="mx-1 btn btn-outline-primary">Create Topic</button>
                        <a href="{{ route('topics.index') }}" class="btn btn-outline-primary">Home</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
