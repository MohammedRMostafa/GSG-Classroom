<x-app-layout>

    <x-slot:title>{{ __('Create New Topic') }}</x-slot:title>
    <div class="container p-3 my-4 border shadow-sm rounded-1">

        <h1 class="mb-4">{{ __('Create New Topic') }}</h1>

        <form action="{{ route('classrooms.topics.store', $classroom) }}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" @class(['form-control', 'is-invalid' => $errors->has('name')]) id="name" name="name" placeholder="name"
                    value="{{ old('name') }}">
                <label for="name">{{ __('Topic Name') }}</label>
                <x-error field-name="name" />

            </div>

            <div class="d-flex col-3">
                <button type="submit" class="mx-1 btn btn-outline-primary">{{ __('Create') }}</button>
                <a href="{{ route('classrooms.topics.index', $classroom) }}"
                    class="btn btn-outline-primary">{{ __('Home') }}</a>
            </div>
        </form>

    </div>

</x-app-layout>
