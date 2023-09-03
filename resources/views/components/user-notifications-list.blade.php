<div class="dropdown">
    <a class="me-3 hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="fas fa-bell">
            @if ($unreadCount > 0)
                <span
                    class="position-absolute top-0 translate-middle badge rounded-pill bg-danger">{{ $unreadCount }}</span>
            @endif
        </i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        @foreach ($notifications as $notification)
            <li class="container">
                <a class="dropdown-item ps-0"
                    href="{{ route('mark.as.read', $notification->id) }}">{{ $notification->data['body'] }}
                    <br> <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small></a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
        @endforeach
        @if ($unreadCount > 0)
            <li class="ps-3"><a href="{{ route('mark.all.as.read') }}" type="button"
                    class="btn btn-sm btn-danger">Ignore All</a></li>
        @else
            <span class="ps-3">{{ __('No notifications') }}</span>
        @endif
    </ul>
</div>
