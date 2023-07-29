<x-app-layout>

    <x-slot:title>Classroom</x-slot:title>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="container p-3">
                    <x-messages />
                    <div class="col-12 mb-3 rounded"
                        style="background-image: url({{ Storage::disk('public')->url($classroom->cover_image_path) }});
                        background-repeat: no-repeat; background-size: cover;">
                        <div class="py-5"></div>
                        <div class="align-bottom p-3">
                            <h1 class="mb-0">{{ $classroom->name }}</h1>
                            <div class="d-flex justify-between">
                                <h3 class="">{{ $classroom->section }}</h3>
                                <a href="{{ route('classroom.topics.index', $classroom->id) }}"
                                    class="btn btn-dark">Topics</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="border rounded p-3 text-center">
                                <span class="text-success fs-5">{{ $classroom->code }}</span>
                                <button onclick="myFunction()" value="{{ $invitation_link }}" id="copy"
                                    class="btn btn-sm btn-primary mt-1">Get
                                    Link</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="container p-3">
                    <div class="row">
                        <div class="border-2 p-2 m-2">
                            <h2>Teachers</h2>
                            <ul>
                                @foreach ($teachers as $teacher)
                                    <li> -> {{ $teacher->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="border-2 p-2 m-2">
                            <h2>Students</h2>
                            <ul>
                                @foreach ($students as $student)
                                    <li> -> {{ $student->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot:js>
        <script>
            function myFunction() {
                var copyText = document.getElementById("copy");
                navigator.clipboard.writeText(copyText.value);
                alert("Copied successfully");
            }
        </script>
    </x-slot:js>
</x-app-layout>
