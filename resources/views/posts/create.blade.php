<x-app-layout>

    <x-slot:title>{{ __('Add New Post') }}</x-slot:title>
    <div class="container p-3 my-4 border shadow-sm rounded-1">

        <h2 class="mb-4">{{ __('Add New Post') }}</h2>

        <form action="{{ route('classrooms.posts.store', $classroom->id) }}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" @class(['form-control', 'is-invalid' => $errors->has('title')]) id="title" name="title" placeholder="Title"
                    value="{{ old('title') }}">
                <label for="title">{{ __('Title') }}</label>
                <x-error field-name="title" />
            </div>
            <div class="form-floating mb-3">
                <textarea @class(['form-control', 'is-invalid' => $errors->has('content')]) id="content" name="content" value="{{ old('content') }}" placeholder="Content"></textarea>
                <label for="content">{{ __('Content') }}</label>
                <x-error field-name="content" />
            </div>

            <div class="d-flex col-3">
                <button type="submit" class="mx-1 btn btn-outline-primary">{{ __('Add Post') }}</button>
                <a href="{{ route('classrooms.posts.index', $classroom->id) }}"
                    class="btn btn-outline-primary">{{ __('Home') }}</a>
            </div>
        </form>

    </div>

</x-app-layout>
