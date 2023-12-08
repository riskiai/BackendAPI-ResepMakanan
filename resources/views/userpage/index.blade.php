@extends('userpage.layouts.main')
@section('content')

    <main>
        <!-- SHOWCASE -->
        <section id="showcase" class="py-5">
            <div class="container">
                <div class="row">
                    <div class="text-center text-white">
                        <h1>Mau Masak Apa Hari ini ?</h1>
                        <form action="#" >
                            <div class="input pt-2">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text"  placeholder="cari resep" name="search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- BAHAN -->
        <section id="bahan" class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 bahan-container text-center">
                        <h1>PUNYA BAHAN APA SAJA</h1>
                        <p>Mau masak apa hari ini ?
                            Masak Bahan Yang Kamu miliki Tinggal pilih bahan yang kamu punya dan dapatkan  resep dengan bahan yang kamu punya!</p>
                        <a href="#">
                        <div class=" img-container  mx-auto mt-3">
                            <div>
                                <img src="{{ asset('assets/image/ayam.png') }}" alt="" class="img-fluid">
                            </div>
                            <div>
                                <img src="{{ asset('assets/image/telur.png') }}" alt="" class="img-fluid">
                            </div>
                            <div>
                                <img src="{{ asset('assets/image/daging.jpg') }}" alt="" class="img-fluid">
                            </div>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- rekomendasi -->
        <section id="rekomendasi">
            <div class="container">
                <div class="row">
                    <h1>Rekomendasi Hari ini</h1>
                    <div class="d-flex flex-row flex-nowrap gap-3 overflow-scroll card-container">
                        <div class="card shadow col-12 col-lg-auto" style="width: 25rem;">
                            <img src="{{ asset('assets/image/nasi-goreng.png') }}" class="card-img-top" alt="...">
                            <div class="card-body  position-relative">
                                <h5 class="card-title">Nasi goreng</h5>
                                <p class="card-text"><a href="#" class="stretched-link text-decoration-none text-black">Some quick example text to build on the card title and make up the bulk
                                    of the card's content.</a></p>
                                <p class="card-text">
                                    <div class="card-icon d-flex justify-content-between">
                                        <a href="#" class="text-black text-decoration-none"><i
                                                class="fa-regular fa-clock"></i> 50 Menit</a>
                                        <a href="#" class="text-black text-decoration-none"><i
                                                class="fa-solid fa-comments"></i> 3 Komentar</a>
                                    </div>
                                </p>
                            </div>
                        </div>
                        <div class="card shadow col-12 col-lg-auto" style="width: 25rem;">
                            <img src="{{ asset('assets/image/nasi-goreng.png') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Nasi goreng</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of the card's content.</p>
                                <p class="card-text">
                                    <div class="card-icon d-flex justify-content-between">
                                        <a href="#" class="text-black text-decoration-none"><i
                                                class="fa-regular fa-clock"></i> 50 Menit</a>
                                        <a href="#" class="text-black text-decoration-none"><i
                                                class="fa-solid fa-comments"></i> 3 Komentar</a>
                                    </div>
                                </p>
                            </div>
                        </div>
                        <div class="card shadow col-12 col-lg-auto" style="width: 25rem;">
                            <img src="{{ asset('assets/image/nasi-goreng.png') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Nasi goreng</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                    of the card's content.</p>
                                <p class="card-text">
                                    <div class="card-icon d-flex justify-content-between">
                                        <a href="#" class="text-black text-decoration-none"><i
                                                class="fa-regular fa-clock"></i> 50 Menit</a>
                                        <a href="#" class="text-black text-decoration-none"><i
                                                class="fa-solid fa-comments"></i> 3 Komentar</a>
                                    </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="artikel">
            <div class="container">
                <div class="row">
                    <h1>Artikel Terbaru</h1>
                    <div class="d-flex flex-row flex-nowrap gap-3 overflow-scroll card-container">
                    <div class="card shadow col-12 col-lg-auto" style="width: 15rem;">
                        <img src="{{ asset('assets/image/nasi-goreng.png') }}" class="card-img-top" alt="...">
                        <div class="card-body  position-relative">
                            <h5 class="card-title">Nasi goreng</h5>
                            <p class="card-text"><a href="#" class="stretched-link text-decoration-none text-black">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</a></p>
                            <p class="card-text">
                                <div class="card-icon d-flex justify-content-between">
                                <p>1 jam yang lalu</p>
                                </div>
                            </p>
                        </div>
                    </div>
                    <div class="card shadow col-12 col-lg-auto" style="width: 15rem;">
                        <img src="{{ asset('assets/image/nasi-goreng.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nasi goreng</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <p class="card-text">
                                <div class="card-icon d-flex justify-content-between">
                                    <p>1 jam yang lalu</p>
                                </div>
                            </p>
                        </div>
                    </div>
                    <div class="card shadow col-12 col-lg-auto" style="width: 15rem;">
                        <img src="{{ asset('assets/image/nasi-goreng.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nasi goreng</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <p class="card-text">
                                <div class="card-icon d-flex justify-content-between">
                                    <p>1 jam yang lalu</p>
                                </div>
                            </p>
                        </div>
                    </div>
                    <div class="card shadow col-12 col-lg-auto" style="width: 15rem;">
                        <img src="{{ asset('assets/image/nasi-goreng.png') }}" class="card-img-top" alt="...">
                        <div class="card-body  position-relative">
                            <h5 class="card-title">Nasi goreng</h5>
                            <p class="card-text"><a href="#" class="stretched-link text-decoration-none text-black">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</a></p>
                            <p class="card-text">
                                <div class="card-icon d-flex justify-content-between">
                                <p>1 jam yang lalu</p>
                                </div>
                            </p>
                        </div>
                    </div>
                    <div class="card shadow col-12 col-lg-auto" style="width: 15rem;">
                        <img src="{{ asset('assets/image/nasi-goreng.png') }}" class="card-img-top" alt="...">
                        <div class="card-body  position-relative">
                            <h5 class="card-title">Nasi goreng</h5>
                            <p class="card-text"><a href="#" class="stretched-link text-decoration-none text-black">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</a></p>
                            <p class="card-text">
                                <div class="card-icon d-flex justify-content-between">
                                <p>1 jam yang lalu</p>
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--Fakta Nutrisi-->
        <section id="nutrisi" class="swiper mySwiper mb-2">
            <div class="container">
                <div class="row">
                    <h1 class="mb-2">Fakta Nutrisi</h1>
                    <div class="col-lg-3 d-none d-lg-block"></div>
                    <div class="col-lg-6 col-12">
                        <!-- <form class="d-flex text-center" role="search">
                            <input class="form-control me-2 search-bar " type="search" placeholder="Search"
                                aria-label="Search">
                        </form> -->
                    </div>
                </div>
            </div>
                <div class="card-container swiper-wrapper">
                    <div class="card shadow swiper-slide" style="width: 20rem;">
                        <img src="{{ asset('assets/image/nasi-goreng.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nasi goreng</h5>
                            <p class="card-text">
                                <ul class="ps-0 text-decoration-none list-unstyled">
                                    <li>Energi  : 1072.5 Kkal </li>
                                    <li>Protein : 130.2 gram </li>
                                    <li>Lemak   : 38.3 gram </li>
                                    <li>Karbohidrat : 63.8 gram </li>
                                </ul>
                            </p>
                        </div>
                    </div>
                    <div class="card shadow swiper-slide" style="width: 20rem;">
                        <img src="{{ asset('assets/image/nasi-goreng.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nasi goreng</h5>
                            <p class="card-text">
                                <ul class="ps-0 list-unstyled">
                                    <li>Energi  : 1072.5 Kkal </li>
                                    <li>Protein : 130.2 gram </li>
                                    <li>Lemak   : 38.3 gram </li>
                                    <li>Karbohidrat : 63.8 gram </li>
                                </ul>
                            </p>
                        </div>
                    </div>
                    <div class="card shadow swiper-slide" style="width: 20rem;">
                        <img src="{{ asset('assets/image/nasi-goreng.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nasi goreng</h5>
                            <p class="card-text">
                                <ul class="ps-0 list-unstyled">
                                    <li>Energi  : 1072.5 Kkal </li>
                                    <li>Protein : 130.2 gram </li>
                                    <li>Lemak   : 38.3 gram </li>
                                    <li>Karbohidrat : 63.8 gram </li>
                                </ul>
                            </p>
                        </div>
                    </div>
                    <div class="card shadow swiper-slide" style="width: 20rem;">
                        <img src="{{ asset('assets/image/nasi-goreng.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nasi goreng</h5>
                            <p class="card-text">
                                <ul class="ps-0 list-unstyled">
                                    <li>Energi  : 1072.5 Kkal </li>
                                    <li>Protein : 130.2 gram </li>
                                    <li>Lemak   : 38.3 gram </li>
                                    <li>Karbohidrat : 63.8 gram </li>
                                </ul>
                            </p>
                        </div>
                    </div>
                    <div class="card shadow swiper-slide" style="width: 20rem;">
                        <img src="{{ asset('assets/image/nasi-goreng.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nasi goreng</h5>
                            <p class="card-text">
                                <ul class="ps-0 list-unstyled">
                                    <li>Energi  : 1072.5 Kkal </li>
                                    <li>Protein : 130.2 gram </li>
                                    <li>Lemak   : 38.3 gram </li>
                                    <li>Karbohidrat : 63.8 gram </li>
                                </ul>
                            </p>
                        </div>
                    </div>
                    <div class="card shadow swiper-slide" style="width: 20rem;">
                        <img src="{{ asset('assets/image/nasi-goreng.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Nasi goreng</h5>
                            <p class="card-text">
                                <ul class="ps-0 list-unstyled">
                                    <li>Energi  : 1072.5 Kkal </li>
                                    <li>Protein : 130.2 gram </li>
                                    <li>Lemak   : 38.3 gram </li>
                                    <li>Karbohidrat : 63.8 gram </li>
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
        </section>

    </main>
   
    @endsection