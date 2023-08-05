<x-app-layout>

    <x-slot:title>Create Classwork</x-slot:title>
    <div class="container p-3 my-4 border shadow-sm rounded-1">

        <h2 class="mb-4">Create Classwork</h2>


        <form action="{{ route('classrooms.classworks.store', [$classroom->id, 'type' => $type]) }}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" @class(['form-control', 'is-invalid' => $errors->has('title')]) id="title" name="title" placeholder="title"
                    value="{{ old('title') }}">
                <label for="title">Classwork title</label>
                <x-error field-name="title" />
            </div>
            <div class="form-floating mb-3">
                <textarea @class(['form-control', 'is-invalid' => $errors->has('description')]) id="description" name="description" placeholder="Description (Optional)"
                    value="{{ old('description') }}"></textarea>
                <label for="description">Description (Optional)</label>
                <x-error field-name="description" />
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" name="topic_id" id="topic_id">
                    <option value="">Select One</option>
                    @foreach ($classroom->topics as $topic)
                        <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                    @endforeach
                </select>
                <label for="topic_id">Topic (Optional)</label>
            </div>



            <div class="d-flex col-3">
                <button type="submit" class="mx-1 btn btn-outline-primary">Create</button>
            </div>
        </form>
    </div>

</x-app-layout>
