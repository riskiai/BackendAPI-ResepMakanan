@extends('userpage.layouts.main')
@section('content')


<main>
    <section id="tulis-resep">
        <div class="container">
            <h1 class="mb-5 text-center pt-5">AYO BAGIKAN RESEP TERBAIKMU</h1>
            <div class="row">
                <form action="">
                    <div class="desc-resep row">
                        <div class="col-12 col-md-4 pt-4">
                            <div class="upload-img text-center mx-auto">
                                <i class="fa-solid fa-camera"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Porsi :</label>
                                    <input type="email" class="form-control" id="inputEmail4">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Waktu memasak :</label>
                                    <input type="password" class="form-control" id="inputPassword4">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <input type="text" class=" form-control" id="judul"
                                        placeholder="Judul Resep Makanan">
                                </div>
                                <div class="mt-3">
                                    <textarea class="form-control"
                                        placeholder="Tuliskan Deskripsi singkat"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bahan-resep row mt-5">
                        <h3>Bahan - Bahan</h3>
                        <div class="col-md-12 ">
                            <div class="input-bahan">
                                <div class="d-flex align-items-center">
                                <i class="fa-solid fa-bars pe-2"></i>
                                <input type="text" class="form-control" id="judul"
                                    placeholder="Bahan">
                                </div>
                            </div>
                                <div class="ps-4 pt-3">
                                <a href="#" class="add-bahan btn-primary d-flex align-items-center text-decoration-none text-center"><i class="fa-solid fa-plus"></i> Bahan</a>
                                </div>
                        </div>
                    </div>
                    <div class="langkah-resep row mt-5">
                        <h3>Langkah - Langkah</h3>
                        <div class="col-md-12 ">
                            <div class="input-langkah">
                                <div class="d-flex align-items-center">
                                <i class="fa-solid fa-bars pe-2"></i>
                                <input type="text" class=" form-control" id="judul"
                                    placeholder="Langkah 1">
                                </div>
                            </div>
                            <div class="ps-4 pt-3">
                            <a href="#" class="add-langkah btn-primary d-flex align-items-center text-decoration-none text-center"><i class="fa-solid fa-plus"></i> Langkah</a>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5 ">
                        <a href="#" class="btn-primary text-decoration-none ms-auto text-center d-block"> Kirim </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>

@endsection
