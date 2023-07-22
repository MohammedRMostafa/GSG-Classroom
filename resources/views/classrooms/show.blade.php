<x-app-layout>

    <x-slot:title>Classroom</x-slot:title>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <div class="container border border-light bg-light py-3 px-5">
                    <div class="col-12 d-flex justify-content-center">
                        @if ($classroom->cover_image_path)
                            <img src="{{ Storage::disk('public')->url($classroom->cover_image_path) }}"
                                style="  border: 1px solid #ddd; border-radius: 20px; padding: 5px; width: 1000px; max-height: 500px;margin-bottom: 10px">
                        @endif
                    </div>
                    <h1 class="mb-4">{{ $classroom->name }}</h1>
                    <h3>{{ $classroom->section }}</h3>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="border rounded p-3 text-center">
                                <span class="text-success fs-2">{{ $classroom->code }}</span>
                            </div>
                        </div>
                        <div class="col-md-9"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
