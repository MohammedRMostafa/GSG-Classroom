<x-app-layout>

    <x-slot:title>Topic</x-slot:title>
    <div class="container p-3 my-4 border shadow-sm rounded-1">
        <h1 class="mb-4">{{ $topic->name }}</h1>

        <div class="row">
            <div class="col-md-3">
                <div class="border rounded p-3 text-center">
                    <span class="text-success fs-2">{{ $topic->name }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-3 mt-3">
                    <a href="{{ route('topics.index') }}" class="btn btn-primary">Home</a>
                    <div class="col-md-2"></div>
                </div>
                <div class="col-md-9"></div>
            </div>
        </div>


    </div>

</x-app-layout>
