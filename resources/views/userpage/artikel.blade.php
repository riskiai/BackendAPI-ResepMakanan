@extends('userpage.layouts.main')
@section('artikel-active', 'active')

@section('content')

<main>
    <section id="hero" class="pt-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 order-2 order-lg-0 position-relative ">
                    <img src="{{ $latestArticle->image ? asset('storage/photo-article/' . $latestArticle->image) : asset('assets/image/nasi-goreng.png') }}" alt="gambar-{{$latestArticle->judul}}" class="w-100">
                    <p class="p-0">{{$latestArticle->created_at->diffForHumans()}}</p>
                    <h3>{{$latestArticle->judul}}</h3>
                    <a href="{{route('detail-artikel',$latestArticle->id)}}" class="stretched-link p-0 text-black text-decoration-none">{{strip_tags($latestArticle->description)}}</a>
                </div>
                <div class="col-lg-4 order-1">
                    <h3>Artikel Terbaru</h3>
                    @foreach ($articles as $index => $item)
                        @if ($index < 3)
                            <div class="card-artikel position-relative">
                                <div class="d-flex gap-2 p-2">
                                    <h5>{{$index + 1}}</h5>
                                    <a href="#" class="stretched-link">{{$item->judul}}</a>
                                </div>
                                <p>{{$item->created_at->diffForHumans()}}</p>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
            <div class="row mt-5 mb-5">
                @foreach ($articles as $item)
                <div class="d-flex flex-column flex-md-row align-items-center card-artikel p-3 position-relative mb-3">
                    <div class="col-md-4 col-12">
                        <img src="{{  $item->image ? asset('storage/photo-article/' . $item->image) : asset('assets/image/nasi-goreng.png') }}" alt="gambar-{{$item->judul}}" class="w-100">
                    </div>
                    <div class="card-desc col-md-8 col-12 ps-md-3">
                        <h3>{{$item->judul}}</h3>
                        <a href="{{route('detail-artikel',$item->id)}}" class="d-inline-block p-0 stretched-link text-black text-decoration-none">{{strip_tags($item->description)}}</a>
                        <p class="pt-5 ps-0">{{$item->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            @endforeach


            </div>
        </div>
    </section>
    {{-- <nav>
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
    </nav> --}}

    <div class="pagination justify-content-center">
        {{  $articles->links() }}
    </div>

</main>
@endsection
