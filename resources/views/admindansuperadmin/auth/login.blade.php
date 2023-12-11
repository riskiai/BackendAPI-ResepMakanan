@extends('userpage.layouts.main')
@section('content')

<main>
    <section id="register" class="pt-5 mt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-lg-flex gap-2 d-none d-lg-block">
                    <div class="img-register">
                        <img src="{{asset('assets/image/login-img-1.png')}}" alt="">
                    </div>
                    <div class="img-register">
                        <img src="{{url('assets/image/login-img-3.png')}}" alt="">
                    </div>
                    <div class="img-register">
                        <img src="{{url('assets/image/login-img-2.png')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-12 offset-lg-1">
                    <div class="form-register">
                        <h3 class="text-center"> Login </h3>
                        <form  action="{{ route('login-proses') }}" method="post" >
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">email</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="">
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="">
                                <label for="password" class="form-label">password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="">
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="d-flex mt-3 justify-content-between">
                                <a class="text-decoration-none text-black" href="{{ route('register') }}">Belum Punya akun ?</a>
                                <button type="submit" href="#" class="btn-register btn text-decoration-none">Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
