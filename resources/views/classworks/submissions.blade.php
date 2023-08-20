<x-app-layout>

    <x-slot:title>Submissions</x-slot:title>

    <div class="container">

        <div class="p-3 my-4 border shadow-sm rounded-1">
            <x-messages />

            <h3>
                Submissions
                <small class="text-muted h5"> for Classwork {{ $classwork->title }}</small>
            </h3>
            <hr>
            <div class="accordion accordion-flush" id="accordionFlushExample">


                @forelse ($submissions as $group)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="flush-heading{{ $group->first()->user_id }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse{{ $group->first()->user_id }}" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                {{ $group->first()->user->name }}
                            </button>
                        </h2>
                        <div id="flush-collapse{{ $group->first()->user_id }}" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <ul>
                                    @foreach ($group as $submission)
                                        <li><a href="{{ route('submissions.file', $submission->id) }}">File
                                                #{{ $loop->iteration }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container p-3 border shadow-sm rounded-1">
                        <p class="text-center fs-6 mb-0">No Submissions Yet</p>
                    </div>
                @endforelse
            </div>
        </div>


    </div>
</x-app-layout>
