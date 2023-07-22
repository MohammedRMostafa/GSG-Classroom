<x-app-layout>

    <x-slot:title>Topic</x-slot:title>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
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
        </div>
    </div>
</x-app-layout>
