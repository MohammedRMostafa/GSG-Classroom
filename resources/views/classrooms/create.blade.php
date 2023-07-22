<x-app-layout>

    <x-slot:title>Create Classroom</x-slot:title>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <h1 class="mb-4">Create New Classroom</h1>


                <form action="{{ route('classrooms.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('classrooms._form', [
                        'button_lable' => 'Create Classroom',
                    ])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
