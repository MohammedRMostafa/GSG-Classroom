<x-app-layout>

    <x-slot:title>Trashed Topics</x-slot:title>
    <div class="container p-3 my-4 border shadow-sm rounded-1">
        <x-messages />
        <h1 class="mb-4">Trashed Topics</h1>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Classroom</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    @foreach ($topics as $topic)
                        <tr>
                            <th>{{ $index++ }}</th>
                            <td>{{ $topic->name }}</td>
                            <td>{{ $topic->classroom->name }}</td>
                            <td>
                                <div class="d-flex">
                                    <form
                                        action="{{ route('classroom.topics.trashed.restore', [$topic->id, $classroom]) }}"
                                        method="POST">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-outline-success mx-1">restore</button>
                                    </form>
                                    <form
                                        action="{{ route('classroom.topics.trashed.force-deletes', [$topic->id, $classroom]) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger mx-1">delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('classroom.topics.index', $classroom) }}" class="col-1 mx-0 mt-3 btn btn-success">Home</a>


    </div>
</x-app-layout>
