@extends('userpage.layouts.main')
@section('content')
<main>
    <section id="biodata">
        <div class="container">
            <div class="row">
                <h1 class="text-center pb-5">Biodata</h1>
                <div class="col-12 col-lg-6">
                    <img class="img-fluid" src="{{ asset('storage/photo-user/'.Auth::user()->image) }}" alt="">
                </div>
                <div class="col-12 col-lg-5 position-relative">
                    <form action="{{ route('guest.profile.update',['id' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <div class="form-group custom-margin">
                            <label for="exampleInputFile">Foto Profil</label>
                            <input type="file" name="image" class="form-control" id="exampleInputFile">
                            @if(Auth::user()->image)
                               {{-- <img src="{{ asset('storage/photo-user/'.Auth::user()->image) }}" alt="" width="100"> --}}
                               <input type="checkbox" name="remove_image" id="remove_image"> Hapus gambar yang ada
                            @endif
                            @error('image')
                               <small>{{ $message }}</small>
                            @enderror
                         </div>
                        <div class="mb-1 mt-lg-3 mt-3 input-group-sm ">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class=" form-control" name="name" id="nama" placeholder="Nama Lengkap..." value="{{Auth::user()->name}}">
                        </div>
                        <div class="mb-1 input-group-sm">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class=" form-control" name="email" id="email" placeholder="email" value="{{Auth::user()->email}}">
                        </div>
                        <div class="d-flex mt-3 justify-content-between">
                            <button type="submit" class="btn-primary text-decoration-none">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
