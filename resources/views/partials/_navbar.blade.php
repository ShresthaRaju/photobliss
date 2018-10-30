<nav class="navbar fixed-top navbar-expand-lg navbar-transparent bg-dark navbar-color-on-scroll" color-on-scroll="300">
    <div class="container">
        {{-- when a user is not authenticated --}}
        @guest
        <a class="navbar-brand font-weight-bold" href="{{ route('welcome') }}">
            PhotoBliss
        </a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="btn btn-rose btn-round btn-raised" href="{{ route('signIn') }}">
                    Sign In
                </a>
            </li>
        </ul>
        @else
        {{-- when a user is authenticated --}}
        <div class="navbar-translate">
            <a class="navbar-brand font-weight-bold" href="{{ route('welcome') }}">
                PhotoBliss
            </a>
            <button aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-toggle="collapse" type="button">
                <span class="sr-only">
                    Toggle navigation
                </span>
                <span class="navbar-toggler-icon">
                </span>
                <span class="navbar-toggler-icon">
                </span>
                <span class="navbar-toggler-icon">
                </span>
            </button>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="nav-link">
                        <i class="material-icons">
                            notifications_active
                        </i>
                        <sup>
                            <span class="badge badge-pill badge-danger">
                                1
                            </span>
                        </sup>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navigationOptions">
                        Welcome, {{Auth::user()->username}}
                    </a>
                    <div aria-labelledby="navigationOptions" class="dropdown-menu dropdown-menu-right dropdown-with-icons">
                        <a class="dropdown-item" href="{{ route('photo.submit') }}">
                            <i class="material-icons">
                                add_a_photo
                            </i>
                            Submit a photo
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="material-icons">
                                person
                            </i>
                            Profile
                        </a>
                        <div class="dropdown-divider">
                        </div>
                        <form action="{{ route('signOut') }}" id="sign-out-form" method="POST" style="display: none">
                            @csrf
                        </form>
                        <a class="dropdown-item" href="{{ route('signOut') }}" onclick="event.preventDefault();
                        document.getElementById('sign-out-form').submit();">
                            <i class="material-icons">
                                security
                            </i>
                            Sign Out
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        @endguest
    </div>
</nav>