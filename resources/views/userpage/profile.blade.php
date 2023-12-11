@extends('userpage.layouts.main')
@section('content')
<main>
    <section id="biodata">
        <div class="container ">
            <div class="row mt-5">
                <h1 class="text-center pb-5 ">Biodata</h1>
                <div class="col-12 col-lg-6">
                    <img class="img-fluid" src="{{ asset('storage/photo-user/'.Auth::user()->image) }}" alt="">
                </div>
                <div class="col-12 col-lg-5 position-relative">
                    <form >
                        <div class="mb-1 mt-3 mt-lg-0 input-group-sm">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class=" form-control" id="nama" placeholder="Nama Lengkap..." value="{{ Auth::user()->name}}" disabled>
                        </div>
                        <div class="mb-1 input-group-sm">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class=" form-control" id="email" placeholder="email" value="{{ Auth::user()->email }}" disabled>
                        </div>
                        <div class="d-flex mt-3 justify-content-between">
                            <a href="{{route('guest.profile.edit-password')}}" class="text-black">Ganti Password</a>
                            <a href="{{route('guest.profile.edit',Auth::User()->id)}}" class="btn-primary text-decoration-none">Edit</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
