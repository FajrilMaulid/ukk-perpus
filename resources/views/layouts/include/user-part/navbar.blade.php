<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">Digital Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($kategori as $kat)
                            <li><a class="dropdown-item" href="{{ route('books.by.category', ['category' => $kat->nama_kategori]) }}">{{ $kat->nama_kategori }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            @auth
            <form action="" class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi bi-person-fill"></i>
                    Profile
                </button>
            </form>
            <form action="{{ route('logout') }}" class="d-flex mx-2">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi bi-door-open-fill"></i>
                    Logout
                </button>
            </form>
            @else
            <form action="{{ route('login') }}" class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi bi-person-fill"></i>
                    Login
                </button>
            </form>
            <form action="{{ route('register') }}" class="d-flex mx-2">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi bi-person-plus-fill"></i>
                    Register
                </button>
            </form>
            @endauth
        </div>
    </div>
</nav>