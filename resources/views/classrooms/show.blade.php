<x-app-layout>

    <x-slot:title>Classroom</x-slot:title>
    <div class="container p-3 my-4 border shadow-sm rounded-1">
        <x-messages />
        <div class="col-12 mb-3 rounded"
            style="background-image: url({{ $classroom->cover_image_url }});
                        background-repeat: no-repeat; background-size: cover;">
            <div class="py-5"></div>
            <div class="align-bottom p-3">
                <h1 class="mb-0">{{ $classroom->name }}</h1>
                <div class="d-flex justify-content-between">
                    <h3>{{ $classroom->section }}</h3>
                    <div class="d-flex">
                        <p><a href="{{ route('classrooms.classworks.index', $classroom->id) }}"
                                class="btn btn-dark mx-1">Classworks</a></p>
                        <p><a href="{{ route('classroom.topics.index', $classroom->id) }}"
                                class="btn btn-dark">Topics</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="border rounded p-2 text-center">
                    <span class="text-success fs-5">{{ $classroom->code }}</span>
                    <button onclick="myFunction()" value="{{ $invitation_link }}" id="copy"
                        class="btn btn-sm btn-primary mt-1">Get
                        Link</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-3 my-4 border shadow-sm rounded-1">
        <div class="row">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Teachers
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul>
                                @foreach ($teachers as $teacher)
                                    <li>{{ $teacher->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Students
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <ul>
                                @foreach ($students as $student)
                                    <li>{{ $student->name }}</li>
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
