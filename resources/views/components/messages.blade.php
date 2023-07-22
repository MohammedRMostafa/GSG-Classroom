@if (session()->has('Add'))
    <div class="alert alert-success col-3">
        <strong>{{ session()->get('Add') }}</strong>
    </div>
@endif

@if (session()->has('Delete'))
    <div class="alert alert-danger col-3">
        <strong>{{ session()->get('Delete') }}</strong>
    </div>
@endif

@if (session()->has('Edit'))
    <div class="alert alert-success col-3">
        <strong>{{ session()->get('Edit') }}</strong>
    </div>
@endif
