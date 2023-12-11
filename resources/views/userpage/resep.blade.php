@extends('userpage.layouts.main')
@section('content')

<main>
    <section id="resep" class="pt-5 mt-5">
        <div class="container">
            <form action="#" class="pb-5">
                <div class="input pt-2">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text"  placeholder="cari resep" name="search">
                </div>
            </form>
            <div class="row pt-5">
                <div class="col-lg-8 col-12 order-2 order-lg-0 ">
                    <div class="position-relative">
                    <img src="{{asset('assets/image/nasi-goreng.png')}}" alt="" class="w-100">
                    <h3>{{$latestResep->judul}}</h3>
                    <div class="d-flex gap-3 ">
                        <p><i class="fa-solid fa-utensils"></i> {{$latestResep->porsi}} </p>
                        <p><i class="fa-solid fa-clock"></i> {{$latestResep->waktu}} </p>
                        {{-- <p class="kategori">Makanan berat</p>
                        <p class="khas">Indramayu</p> --}}
                    </div>
                    <a href="{{route('detail-resep',$latestResep->id)}}" class="p-0 stretched-link text-black text-decoration-none">{{strip_tags($latestResep->description)}}</a>
                </div>
                </div>
                <div class="col-lg-4 order-1">
                    <h3>Resep Terbaru</h3>
                    @foreach ($recipes as $index => $item )
                        @if($index < 3)
                        <div class="card-artikel position-relative">
                            <div class="d-flex gap-2 p-2">
                                <h5>0{{$index + 1}}</h5>
                                <a href="{{route('detail-resep',$item->id)}}" class="stretched-link">{{$item->judul}}</a>
                            </div>
                            <div class="d-flex gap-3 ps-2">
                            <p><i class="fa-solid fa-utensils"></i> {{$item->porsi}} </p>
                            <p><i class="fa-solid fa-clock"></i> {{$item->waktu}}</p>
                            </div>
                            <p class="ps-2">{{$item->user->name}}</p>
                        </div>
                        @endif
                    @endforeach

                    {{-- <div class="card-artikel">
                        <div class="d-flex gap-2 p-2">
                            <h5>02</h5>
                            <h5>Resep nasi goreng</h5>
                        </div>
                        <div class="d-flex gap-3 ps-2">
                        <p><i class="fa-solid fa-utensils"></i> 4 porsi </p>
                        <p><i class="fa-solid fa-clock"></i> 30 menit</p>
                        </div>
                        <p class="ps-2">oleh nizar</p>
                    </div>
                    <div class="card-artikel">
                        <div class="d-flex gap-2 p-2">
                            <h5>03</h5>
                            <h5>Resep nasi goreng</h5>
                        </div>
                        <div class="d-flex gap-3 ps-2">
                        <p><i class="fa-solid fa-utensils"></i> 4 porsi </p>
                        <p><i class="fa-solid fa-clock"></i> 30 menit</p>
                        </div>
                        <p class="ps-2">oleh nizar</p>
                    </div> --}}
                </div>
            </div>
            <div class="row mt-5 mb-5">

                @foreach ($recipes as $item )
                <div class="d-flex flex-column flex-md-row align-items-center card-artikel p-3 mb-3 position-relative">
                    <div class="col-12 col-md-4">
                        <img class="w-100" src="{{asset('assets/image/nasi-goreng.png')}}" alt="nasi-goreng">
                    </div>
                    <div class="col-md-8 col-12 ps-md-3">
                        <h3>{{$item->judul}}</h3>
                        <a href="{{route('detail-resep',$item->id)}}" class="p-0 stretched-link"> {{ Illuminate\Support\Str::limit(strip_tags($item->description),100) }}</a>
                        <div class="d-flex gap-3 ">
                        <p><i class="fa-solid fa-utensils"></i> {{$item->porsi}} </p>
                        <p><i class="fa-solid fa-clock"></i> {{$item->waktu}} </p>
                        {{-- <p class="kategori">Makanan berat</p>
                        <p class="khas">Indramayu</p> --}}
                    </div>
                    <p>oleh nizar</p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <nav>
        <ul class="pagination gap-3 text-decoration-none">
            <li><a href="#">
                <span class="fa-solid fa-chevron-left"></span>
            </a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="#">
                <span class="fa-solid fa-chevron-right"></span>
            </a></li>
        </ul>
    </nav>

</main>

@endsection
