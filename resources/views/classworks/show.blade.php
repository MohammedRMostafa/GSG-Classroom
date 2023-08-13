<x-app-layout>

    <x-slot:title>Classwork {{ $classwork->title }}</x-slot:title>
    <div class="container p-3 my-4 border shadow-sm rounded-1">

        <x-messages />
        <h2 class="mb-4">Classwork {{ $classwork->title }}</h2>
        <hr>
        <p> {{ $classwork->description }}</p>
    </div>

    <div class="container p-3 my-4 border shadow-sm rounded-1">

        <h2 class="mb-4">Comments</h2>

        @foreach ($classwork->comments as $comment)
            <div class="d-flex justify-content-start border rounded p-2 mb-2">
                <div class="me-1">
                    <img src="{{ url('https://ui-avatars.com/api/?rounded=true&size=32&name=' . $comment->user->name) }}"
                        alt="">
                </div>
                <div>
                    <div class="d-flex">
                        <h5 class="me-3">{{ $comment->user->name }}</h5>
                        <p class="text-muted fs-6">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                    <p>{{ $comment->content }}</p>
                </div>
            </div>
        @endforeach

        <form action="{{ route('comments.store') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $classwork->id }}">
            <input type="hidden" name="type" value="classwork">
            <div class="d-flex">
                <div class="col-8">
                    <div class="form-floating mb-3">
                        <textarea @class(['form-control', 'is-invalid' => $errors->has('content')]) id="content" name="content" value="{{ old('content') }}"></textarea>
                        <label for="content">Comment</label>
                        <x-error field-name="content" />
                    </div>
                </div>
                <div class="ms-1">
                    <button type="submit" class="mx-1 btn btn-outline-primary">Comment</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
