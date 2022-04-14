<nav class="navbar navbar-expand-lg py-3 navbar-light bg-light shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ route('frontend.index') }}">E-Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link fw-bold active" aria-current="page" href="{{ route('frontend.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold" href="{{ route('frontend.category') }}">Category</a>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link fw-bold dropdown-toggle text-capitalize" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">
                                My Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cart.index') }}" class="nav-link position-relative">
                            <span class="material-icons-round">shopping_cart</span>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-count-container">{{ $cart_count }}</span>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>