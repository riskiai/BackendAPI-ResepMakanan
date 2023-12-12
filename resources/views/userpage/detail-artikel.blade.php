@extends('userpage.layouts.main')
@section('artikel-active', 'active')
@section('content')

<main>
    <section id="detail-artikel" class="pt-5 mt-5">
        <div class="container">
            <div class="row">
                <h1>{{$article->judul}}</h1>
                <p>{{$article->created_at->diffForHumans()}}</p>
                <div class="col-lg-11 col-12 pb-5 ">
                    <img src="{{ asset('storage/photo-article/' . $article->image) }}" alt="" class="card-img-top">
                </div>
                <div class="col-12">
                    {!!$article->description!!}
                </div>
            </div>
        </div>
    </section>

</main>

@endsection
