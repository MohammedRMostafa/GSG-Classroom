<x-app-layout>

    <x-slot:title>Posts</x-slot:title>
    <div class="container p-3 my-4 border shadow-sm rounded-1">
        <x-messages />
        @forelse ($classroom->posts as $post)
            <div class="d-flex justify-content-center mb-5">
                <div class="col-md-8 border shadow-sm rounded">
                    <div class="bg-white p-2">
                        <div class="d-flex flex-row user-info">
                            <img class="rounded-circle me-1"
                                src="{{ url('https://ui-avatars.com/api/?rounded=true&size=32&name=' . $post->user->name) }}"
                                width="32">
                            <div class="d-block font-weight-bold">{{ $post->user->name }}
                                <span class="text-black-50">{{ $post->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                        <hr>
                        <div class="mt-2">
                            <p class="comment-text">{{ $post->content }}</p>
                        </div>
                    </div>

                    <div class="bg-light p-2">
                        <form action="{{ route('comments.store') }}" method="post"
                            class="row align-items-center mb-3 p-1">
                            @csrf
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <input type="hidden" name="type" value="post">
                            <div class="col-1 justify-end me-0">
                                <img class="rounded-circle"
                                    src="{{ url('https://ui-avatars.com/api/?rounded=true&size=32&name=' . Auth::user()->name) }}">
                            </div>
                            <div class="form-floating me-2 col-md-8">
                                <textarea @class(['form-control', 'is-invalid' => $errors->has('content')]) id="content" name="content" value="{{ old('content') }}"></textarea>
                                <label for="content">Comment</label>
                                <x-error field-name="content" />
                            </div>

                            <button class="btn btn-primary btn-sm shadow-none col-auto" type="submit">Post
                                comment</button>
                        </form>
                        @foreach ($post->comments as $comment)
                            <div class="d-flex justify-content-start border rounded ps-1 pt-1 mb-2">
                                <div class="me-1">
                                    <img src="{{ url('https://ui-avatars.com/api/?rounded=true&size=32&name=' . $comment->user->name) }}"
                                        alt="">
                                </div>
                                <div>
                                    <div class="d-flex">
                                        <h5 class="me-3 mb-0">{{ $comment->user->name }}</h5>
                                        <p class="text-muted fs-6">{{ $comment->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                    <p>{{ $comment->content }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        @empty
            <div class="p-3 border shadow-sm rounded-1">
                <p class="text-center fs-6 mb-0">No Posts Yet. Create one to get started!</p>
            </div>
        @endforelse
        <a href="{{ route('classrooms.posts.create', $classroom->id) }}" class="col-1 mx-1 mt-3 btn btn-success">Add
            Post</a>
    </div>



</x-app-layout>
