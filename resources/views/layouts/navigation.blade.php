{{-- ===================================================================================== --}}


<header class="p-2 mb-5 bg-light ">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img class="bi me-2" width="32" height="32" role="img" aria-label="Bootstrap"
                    src="{{ asset('logo.png') }}" />

            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="{{ route('classrooms.index') }}"
                        class="nav-link px-2 link-secondary">{{ __('Classrooms') }}</a></li>
            </ul>

            <x-user-notifications-list count="5" />


            <div class="select-position">
                <form action="{{ route('locale') }}" method="post">
                    @csrf
                    <select name="locale" onchange="this.form.submit()" class="me-md-3" data-width="fit">
                        <option value="en" @selected(Auth::user()->locale == 'en')>English</option>
                        <option value="ar" @selected(Auth::user()->locale == 'ar')>عربي</option>
                    </select>
                </form>
            </div>


            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('logo.png') }}" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="dropdown-item" href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>


                    </li>
                </ul>
            </div>

        </div>
    </div>
</header>
