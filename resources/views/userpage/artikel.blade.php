@extends('userpage.layouts.main')
@section('content')

<main>
    <section id="hero" class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 order-2 order-lg-0 position-relative ">
                    <img src="{{url('frontend/img/nasi-goreng.png')}}" alt="" class="w-100">
                    <p class="p-0">1 jam yang lalu</p>
                    <h3>ini resep nasi goreng asli khas  mamang nizar</h3>
                    <a href="#" class="stretched-link p-0 text-black text-decoration-none">ini adalah resep khas mamang nizar nasi goreng ini beda dari nasi goreng yang biasa kita buat nasi goreng ini hanya menggunakan bahan...</a>
                </div>
                <div class="col-lg-4 order-1">
                    <h3>Artikel Terbaru</h3>
                    <div class="card-artikel position-relative">
                        <div class="d-flex gap-2 p-2">
                            <h5>01</h5>
                            <a href="#" class="stretched-link">ini cara membuat nasi goreng biar kaya abang abang</a>
                        </div>
                        <p>1 jam yang lalu</p>
                    </div>
                    <div class="card-artikel position-relative">
                        <div class="d-flex gap-2 p-2">
                            <h5>02</h5>
                            <a href="#" class="stretched-link">ini cara membuat nasi goreng biar kaya abang abang</a>
                        </div>
                        <p>1 jam yang lalu</p>
                    </div>
                    <div class="card-artikel position-relative">
                        <div class="d-flex gap-2 p-2">
                            <h5>03</h5>
                            <a href="#" class="stretched-link">ini cara membuat nasi goreng biar kaya abang abang</a>
                        </div>
                        <p>1 jam yang lalu</p>
                    </div>
                </div>
            </div>
            <div class="row mt-5 mb-5">
                <div class="d-flex flex-column flex-md-row align-items-center card-artikel p-3 position-relative">
                    <div class="col-md-4 col-12">
                        <img class="w-100" src="{{('frontend/img/nasi-goreng.png')}}" alt="nasi-goreng">
                    </div>
                    <div class="card-desc col-md-8 col-12 ps-md-3">
                        <h3>ini resep nasi goreng</h3>
                        <a href="#" class="d-inline-block p-0 stretched-link text-black text-decoration-none">ini adalah resep opor buat lebaran, opor merupakan makanan yang khas disajikan saat lebaran nah ini dia resep opor yang enak poll karena sudah sering jadi langganan resep saat lebaran, tidak seperti resep opor biasanya resep opor ini....</a>
                        <p class="pt-5 ps-0">1 jam yang lalu</p>
                    </div>
                </div>
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