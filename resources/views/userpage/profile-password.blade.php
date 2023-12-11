@extends('userpage.layouts.main')
@section('content')
<main class="mt-5">
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
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" class=" form-control" id="password" placeholder="">
                        </div>
                        <div class="mb-1 input-group-sm">
                            <label for="confirm-password" class="form-label">Confirm Password</label>
                            <input type="password" class=" form-control" id="confirm-password" placeholder="">
                        </div>
                        <div class="d-flex mt-3 justify-content-between">
                            <a class="btn-primary text-decoration-none" href="#">Simpan</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
