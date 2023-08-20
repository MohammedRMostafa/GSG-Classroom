<x-app-layout>

    <x-slot:title>Classwork {{ $classwork->title }}</x-slot:title>

    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="p-3 my-4 border shadow-sm rounded-1">

                    <x-messages />
                    <h2 class="mb-4">Classwork {{ $classwork->title }}</h2>
                    <hr>
                    <p> {{ $classwork->description }}</p>
                </div>

                <div class="p-3 my-4 border shadow-sm rounded-1">

                    <h2 class="mb-4">Comments</h2>



                    <form action="{{ route('comments.store') }}" method="post" class="row align-items-center mb-3 p-1">
                        @csrf
                        <input type="hidden" name="id" value="{{ $classwork->id }}">
                        <input type="hidden" name="type" value="classwork">
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

                    @foreach ($classwork->comments as $comment)
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
            <div class="col-md-4">
                <div class="p-3 my-4 border shadow-sm rounded-1">
                    <h4>Submission</h4>
                    @if ($submissions->count())
                        <ul>
                    @endif
                    @forelse ($submissions as $submission)
                        <li><a href="{{ route('submissions.file', $submission->id) }}">File
                                #{{ $loop->iteration }}</a></li>
                    @empty
                        <form action="{{ route('submissions.store', $classwork->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="file" @class(['form-control', 'is-invalid' => $errors->has('files')]) id="files" name="files[]"
                                    multiple accept="image/*,application/pdf,text/plain">
                                <label for="files">Upload Files</label>
                                <x-error field-name="files" />
                            </div>
                            <div>
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                            </div>
                        </form>
                    @endforelse
                    @if ($submissions->count())
                        </ul>
                    @endif

                </div>

            </div>
        </div>
    </div>
</x-app-layout>
