@extends('userpage.layouts.main')
@section('content')
<main>
    <section id="tulis-resep">
        <div class="container mt-5">
            <h1 class="mb-5 text-center pt-5">AYO BAGIKAN RESEP TERBAIKMU</h1>
            <div class="row">
                <form  action="{{ route('guest.resepku.update',['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="desc-resep row">
                        <div class="form-group ">
                            <label for="exampleInputFile">Foto Profil</label>
                            <input type="file" name="image" class="form-control" id="exampleInputFile">
                            @if($data->image)
                               <img src="{{ asset('storage/photo-resep/'.$data->image) }}" alt="" width="100">
                               <br>
                               <input type="checkbox" name="remove_image" id="remove_image"> Hapus gambar yang ada
                            @endif
                            @error('image')
                               <small>{{ $message }}</small>
                            @enderror
                         </div>
                        <div class=" col-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Porsi :</label>
                                    <input type="text" name="porsi" class="form-control" id="inputEmail4" value="{{$data->porsi}}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputPassword4" class="form-label">Waktu memasak :</label>
                                    <input type="text" name="waktu" class="form-control" id="inputPassword4" value="{{$data->waktu}}">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="">Judul :</label>
                                    <input type="text" name="judul" class=" form-control" id="judul"
                                        placeholder="Judul Resep Makanan" value="{{$data->judul}}">
                                </div>
                                <div class="mt-3">
                                    <textarea class="form-control"
                                        placeholder="Tuliskan Deskripsi singkat" name="description">{{$data->description}}</textarea>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="editor">Bahan & Langkah</label>
                                    <textarea id="editor" name="bahan_langkah">{{$data->bahan_langkah}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="bahan-resep row mt-5">
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
                    </div> --}}
                    <div class="pt-5 ">
                        <button type="submit" class="btn-primary text-decoration-none ms-auto text-center d-block"> Kirim </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ),
        {
            ckfinder:
            {
                uploadUrl:"{{route('guest.ckeditor.upload',['_token'=>csrf_token()])}}",
            }
        })
        .catch( error => {
            console.error( error );
        });
</script>
@endsection
