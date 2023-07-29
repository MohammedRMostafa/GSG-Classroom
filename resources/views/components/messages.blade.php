{{-- @if ($errors->any())
    <div class="alert alert-danger col-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

{{-- <x-errors /> --}}

@if (session()->has('Add'))
    <div class="alert alert-success col-4">
        <strong>{{ session()->get('Add') }}</strong>
    </div>
@endif

@if (session()->has('Delete'))
    <div class="alert alert-danger col-4">
        <strong>{{ session()->get('Delete') }}</strong>
    </div>
@endif

@if (session()->has('Edit'))
    <div class="alert alert-success col-4">
        <strong>{{ session()->get('Edit') }}</strong>
    </div>
@endif

@if (session()->has('Restore'))
    <div class="alert alert-success col-4">
        <strong>{{ session()->get('Restore') }}</strong>
    </div>
@endif

@if (session()->has('Info'))
    <div class="alert alert-primary col-4">
        <strong>{{ session()->get('Info') }}</strong>
    </div>
@endif
