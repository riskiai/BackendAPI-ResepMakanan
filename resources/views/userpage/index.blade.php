@extends('userpage.layouts.main')
@section('home-active', 'active')

@section('content')

    <main>
        <!-- SHOWCASE -->
        <section id="showcase" class="py-5">
            <div class="container">
                <div class="row">
                    <div class="text-center text-white">
                        <h1>Mau Masak Apa Hari ini ?</h1>
                        <form action="{{route('resep.search')}}"  method="POST">
                            @csrf
                            @method('GET')
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
                        <a href="{{url('bahan')}}">
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
                    <div class="d-flex justify-content-between align-center">
                        <h1>Rekomendasi Hari ini</h1>
                        <a href="{{url('resep')}}" class="text-decoration-none text-secondary">lihat semua >>></a>
                    </div>
                    <div class="d-flex flex-row flex-nowrap gap-3 overflow-scroll card-container">

                        @foreach ($recipes as $index => $item )
                            @if($index < 5)
                            <div class="card shadow col-12 col-lg-auto" style="width: 25rem;">
                                {{-- <img src="{{ asset('assets/image/nasi-goreng.png') }}" class="card-img-top" alt="..."> --}}
                                <img src="{{ $item->image ? asset('storage/photo-resep/' . $item->image) : asset('assets/image/nasi-goreng.png') }}" alt="gambar-{{$item->judul}}"class="card-img-top" style="max-height: 300px">
                                <div class="card-body  position-relative">
                                    <h5 class="card-title">{{$item->judul}}</h5>
                                    <p class="card-text"><a href="{{route('detail-resep',$item->id)}}" class="stretched-link text-decoration-none text-black">{{ Illuminate\Support\Str::limit(strip_tags($item->description),30) }}</a></p>
                                    <p class="card-text">
                                        <div class="card-icon d-flex justify-content-between">
                                            <a href="{{route('detail-resep',$item->id)}}" class="text-black text-decoration-none"><i
                                                    class="fa-regular fa-clock"></i> {{$item->waktu}}</a>
                                            <a href="{{route('detail-resep',$item->id)}}" class="text-black text-decoration-none"><i
                                                    class="fa-solid fa-comments"></i> {{$item->comments->count() ?? 0}}</a>
                                        </div>
                                    </p>
                                </div>
                            </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </section>

        <section id="artikel">
            <div class="container">
                <div class="row">
                    <div class="d-flex justify-content-between align-center">
                        <h1>Artikel Terbaru</h1>
                        <a href="{{url('artikel')}}" class="text-decoration-none text-secondary">lihat semua >>></a>
                    </div>
                    <div class="d-flex flex-row flex-nowrap gap-3 overflow-scroll card-container">
                        @foreach ($articles as $index => $item )
                            @if ($index < 5)
                        <div class="card shadow col-12 col-lg-auto" style="width: 15rem;">
                            <img src="{{ asset('storage/photo-article/' . $item->image) }}" alt="gambar-{{$item->judul}}" class="card-img-top">
                            <div class="card-body  position-relative">
                                <h5 class="card-title">{{$item->judul}}</h5>
                                <p class="card-text"><a href="{{route('detail-artikel',$item->id)}}" class="stretched-link text-decoration-none text-black">
                                    {{ Illuminate\Support\Str::limit(strip_tags($item->description),30) }}</a></p>
                                <p class="card-text">
                                    <div class="card-icon d-flex justify-content-between">
                                    <p>{{$item->created_at->diffForHumans()}}</p>
                                    </div>
                                </p>
                            </div>
                        </div>
                        @endif
                        @endforeach
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
                    @foreach ($nutrisi as $item )
                    <div class="card shadow swiper-slide" style="width: 20rem;">
                        {{-- <img src="{{ asset('assets/image/nasi-goreng.png') }}" class="card-img-top" alt="..."> --}}
                        <img src="{{ asset('storage/photo-nutrisi/' . $item->image) }}" alt="gambar-{{$item->judul}}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text">
                                <ul class="ps-0 text-decoration-none list-unstyled">
                                    <li>{{ $item->energi }} </li>
                                    <li>{{ $item->protein  }}</li>
                                    <li>{{ $item->lemak  }}</li>
                                    <li>{{ $item->karbohidrat  }}</li>
                                </ul>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
        </section>

    </main>

    @endsection
