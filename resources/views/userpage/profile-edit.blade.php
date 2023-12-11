@extends('userpage.layouts.main')
@section('content')
<main>
    <section id="biodata">
        <div class="container">
            <div class="row">
                <h1 class="text-center pb-5">Biodata</h1>
                <div class="col-12 col-lg-6">
                    <img class="img-fluid" src="img/profile.jpeg" alt="">
                </div>
                <div class="col-12 col-lg-5 position-relative">
                    <form action="" >
                        <div class="mb-1 mt-3 mt-lg-0 input-group-sm">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class=" form-control" id="nama" placeholder="Nama Lengkap..." value="{{Auth::user()->name}}">
                        </div>
                        <div class="mb-1 input-group-sm">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class=" form-control" id="email" placeholder="email" value="{{Auth::user()->email}}">
                        </div>
                        <div class="d-flex mt-3 justify-content-between">
                            <a class="btn-primary text-decoration-none">Simpan</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
