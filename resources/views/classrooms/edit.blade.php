<x-app-layout>

    <x-slot:title>Edit Classroom</x-slot:title>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <h1 class="mb-4">Edit Classroom '{{ $classroom->name }}'</h1>

                <form action="{{ route('classrooms.update', $classroom->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @include('classrooms._form', [
                        'button_lable' => 'Update Classroom',
                    ])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
