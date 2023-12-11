@if(auth()->check())
<header>
    <nav class="navbar navbar-expand-lg " style="background-color:#FFF;">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/image/nasi-goreng.png/YOMASAK.png')}}" width="200px" height="30px" alt="Yomasak">
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
                </ul>
                <ul class="navbar-nav profile-menu">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile-pic">
                                <img src="{{Auth::user()->image ? asset('storage/photo-user/' .Auth::user()->image) : asset('assets/image/default-profile.jpg')}}" alt="Profile Picture">
                            </div>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('guest.profile')}}"><i class="fa-solid fa-id-badge"></i> lihat
                                    Profile</a></li>
                            <li><a class="dropdown-item" href="{{route('guest.resepku')}}"><i class="fa-solid fa-file-lines"></i> lihat Resep
                                    ku</a></li>
                            <li><a class="dropdown-item" href="{{route('guest.tulis-resep')}}"><i class="fa-solid fa-file-circle-plus"></i>
                                    Tambah Resep</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt fa-fw"></i> Log
                                    Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

@else
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
@endif
