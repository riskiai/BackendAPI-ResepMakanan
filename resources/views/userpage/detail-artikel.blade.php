@extends('userpage.layouts.main')
@section('content')

<main>
    <section id="detail-artikel" class="pt-5">
        <div class="container">
            <div class="row">
                <h1>{{$article->judul}}</h1>
                @php
                    // Set the locale to Bahasa Indonesia
                    \Carbon\Carbon::setLocale('id');
                @endphp
                <p>{{$article->created_at->diffForHumans()}}</p>
                <div class="col-lg-11 col-12 pb-5 ">
                    <img class="img-fluid w-100" src="{{asset('assets/image/nasi-goreng.png')}}"  alt="">
                </div>
                <div class="col-12">
                    {!!$article->description!!}
                </div>
            </div>
        </div>
    </section>

</main>

@endsection
