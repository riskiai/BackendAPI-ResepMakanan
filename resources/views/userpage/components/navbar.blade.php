<header>
    <nav class="navbar navbar-expand-lg" style="background-color:#FFF;" id="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/image/YOMASAK.png') }}" width="200px" height="30px" alt="Yomasak">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}#bahan">Bahan Masakan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}#rekomendasi">Resep</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}#artikel">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-login" href="{{route('login')}}">login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
