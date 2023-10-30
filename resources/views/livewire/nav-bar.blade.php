<nav class="navbar bg-primary navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="{{ Route('home') }}">Home</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                @guest
                    <li class="nav-item">
                        <a wire:navigate class="nav-link {{ Request::is('register') ? 'active' : '' }}" href="{{ Route('registerUsers') }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a wire:navigate class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ Route('loginUsers') }}">Login</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <a wire:navigate class="nav-link {{ Request::is('products') ? 'active' : '' }}" href="{{ Route('allProducts') }}">My Products</a>
                    </li>
                    <li class="nav-item">
                        <button wire:click='logout' class="nav-link active">Logout</button>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
