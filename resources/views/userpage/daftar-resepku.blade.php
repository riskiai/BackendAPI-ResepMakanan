@extends('userpage.layouts.main')
@section('content')
<main>
    <section id="daftar-resep">
        <div class="container">
            <form action="#" class="pb-5 pt-5">
                <div class="input pt-2">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text"  placeholder="cari resep" name="search">
                </div>
            </form>
            <div class="row mt-5 mb-5">
                <h1>Daftar Resep Buatanku</h1>
                <div class="d-flex flex-column  flex-md-row  card-artikel mt-5 p-md-3 position-relative">
                    <div class="col-md-4 col-12">
                        <img class="w-100" src="img/nasi-goreng.png" alt="nasi-goreng">
                    </div>
                    <div class="col-md-8 col-12  ps-md-3 ">
                        <div class="resep-link d-flex justify-content-between">
                        <a href="#" class="stretched-link">ini resep nasi goreng </a>
                        <div class="d-flex flex-row pt-1 gap-1">
                            <a class="btn-edit text-white" href="#">Edit</a>
                            <a class="btn-delete text-white" href="#">Delete</a>
                        </div>
                        </div>
                        <p class="p-0">ini adalah resep opor buat lebaran, opor merupakan makanan yang khas disajikan saat lebaran nah ini dia resep opor yang enak poll karena sudah sering jadi langganan resep saat lebaran, tidak seperti resep opor biasanya resep opor ini....</p>
                        <div class="d-flex gap-3">
                        <p><i class="fa-solid fa-utensils"></i> 4 porsi </p>
                        <p><i class="fa-solid fa-clock"></i> 30 menit</p>
                        <p class="kategori">Makanan berat</p>
                        <p class="khas">Indramayu</p>
                    </div>
                    <p>oleh nizar</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
