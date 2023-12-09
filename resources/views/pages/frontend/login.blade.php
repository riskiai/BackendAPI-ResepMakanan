@extends('layouts.frontend')
@section('content')

<main>
    <section id="register" class="pt-5 mt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-lg-flex gap-2 d-none d-lg-block">
                    <div class="img-register">
                        <img src="{{url('frontend/img/login-img-1.png')}}" alt="">
                    </div>
                    <div class="img-register">
                        <img src="{{url('frontend/img/login-img-3.png')}}" alt="">
                    </div>
                    <div class="img-register">
                        <img src="{{url('frontend/img/login-img-2.png')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-12 offset-lg-1">
                    <div class="form-register">
                        <h3 class="text-center"> Login </h3>
                        <form action="" >
                            <div class="mb-3">
                                <label for="email" class="form-label">email</label>
                                <input type="text" class="form-control" id="email" placeholder="">
                            </div>
                            <div class="">
                                <label for="password" class="form-label">password</label>
                                <input type="password" class="form-control" id="password" placeholder="">
                            </div>
                            <div class="d-flex mt-3 justify-content-between">
                                <a class="text-decoration-none text-black" href="#">Belum Punya akun ?</a>
                                <a href="#" class="btn-register text-decoration-none">Masuk</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
