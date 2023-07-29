<x-app-layout>

    <x-slot:title>Join To Classroom</x-slot:title>
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg d-flex justify-content-center">
                <div class="card m-4 text-center" style="width: 30rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $classroom->name }}</h5>
                        <p class="card-text">Click on the Join icon to enter the Classroom</p>
                        <form action="{{ route('classrooms.join', $classroom->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Join</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
