@extends('userpage.layouts.main')
@section('content')

<main>
    <section id="detail-resep">
        <div class="container pt-5 mt-5">
            <h2>{{$resep->judul}}</h2>
            <div class="row pt-3">
                <div class="col-lg-7">
                    <img src="{{asset('assets/image/nasi-goreng.png')}}" class="w-100" alt="">
                </div>
                <div class="col-lg-5 pt-3 d-flex flex-column justify-content-between">
                    <div>
                    <div class="d-flex gap-3">
                        <p class="kategori">Makanan berat</p>
                        <p class="khas">Indramayu</p>
                    </div>
                    <div class="d-flex gap-4 ps-1 ">
                        <p><i class="fa-solid fa-utensils"></i> {{$resep->porsi}} </p>
                        <p><i class="fa-solid fa-clock"></i> {{$resep->waktu}}</p>
                    </div>
                    <p>{!! $resep->description !!}</p>
                </div>
                    <div class="img-author d-flex  ">
                        <img src="{{asset('assets/image/profile.jpeg')}}" alt="">
                        <div class="ps-2 d-flex flex-column">
                            <p class="m-0">{{$resep->user->name}}</p>
                            <p class="time p-0">{{$resep->created_at}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {!!$resep->bahan_langkah!!}
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-12">
                    <h3>Bahan - Bahan</h3>
                    <ol class="bahan-bahan">
                        <li>Nasi</li>
                        <li>Bawang Putih</li>
                        <li>Bawang Merah</li>
                        <li>Garam</li>
                        <li>penyedap rasa</li>
                        <li>Bawang Merah</li>
                        <li>Bawang Merah</li>
                        <li>Bawang Merah</li>
                        <li>Bawang Merah</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <h3>Cara memasak</h3>
                <ul class="list-unstyled">
                    <li>
                        <div class="d-flex langkah pb-3">
                            <img src="img/nasi-goreng.png" alt="">
                            <div class="ps-3">
                                <h5>langkah 1</h5>
                                <p> Siapkan penggorengan dengan api sedang, tuang margarin atau minyak goreng.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex langkah pb-3">
                            <img src="img/nasi-goreng.png" alt="">
                            <div class="ps-3">
                                <h5>langkah 2</h5>
                                <p> Masukkan bawang putih dan daun bawang yang sudah dicincang halus. Tumis hingga berbau harum atau hingga warnanya keemasan</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex langkah pb-3">
                            <img src="img/nasi-goreng.png" alt="">
                            <div class="ps-3">
                                <h5>langkah 3</h5>
                                <p>Masukkan sosis dan 1 butir telur ayam. Tumis sebentar.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex langkah pb-3">
                            <!-- <img src="" alt=""> -->
                            <div class="ps">
                                <h5>langkah 4</h5>
                                <p> Siapkan penggorengan dengan api sedang, tuang margarin atau minyak goreng.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="d-flex langkah ">
                            <!-- <img src="img/nasi-goreng.png" alt=""> -->
                            <div class="ps">
                                <h5>langkah 5</h5>
                                <p> Tuang kecap manis, saus sambal, saus tiram, garam, dan kaldu bubuk. Aduk hingga warna nasi berubah secara merata</p>
                            </div>
                        </div>
                    </li>
                </ul>

            </div> --}}
            <div class="row">
                <div class="card-komentar mt-5">
                    <div>
                        <h5>Komentar</h5>
                        <hr>
                    </div>
                    <div>
                        @foreach ($resep->comments as $item )
                        <div class="d-flex flex-row p-3 mb-3"> <img src="https://asapcairtenajar.com/frontend/assets/image/user.png"
                            style="width: 40px;height:40px" class="rounded-circle mr-3 me-3">
                        <div class="w-100">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-row align-items-center"><span class="mr-2 comment-name"><B>{{$item->user->name}}</B></span>
                                </div>
                            </div>
                            <small>{{$item->created_at}}</small>
                            <p class="text-justify comment-text mb-0 ">{{strip_tags($item->comment_resep)}}</p>
                        </div>
                    </div>
                    <hr>
                        @endforeach
                    </div>
                    <form action="{{ route('detail-resep.addComment', ['id' => $resep->id]) }}" method="POST" class ="row-cols-lg-auto g-3" >
                        @csrf
                        <div class="mb-3 mt-3 col-lg-4 ">
                        {{-- <input type="hidden" name="_token" value="iuInMoQPbuIaeNpYRfJLdzok0FavvYmsXzwVwDFA">
                            <label for="nama" name="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="name" aria-describedby="nama">
                        </div> --}}
                        <div class="form-floating col-12 col-lg-auto">
                            <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea"
                                style="height: 100px" required></textarea>
                            <label for="floatingTextarea">Isi komentar...</label>
                        </div>
                        @if(auth()->check())
                        <button type="submit" class="btn btn-success mt-3 mb-5">Tambahkan komentar</button>
                        @else
                        <a href="{{route('login')}}" class="btn btn-success mt-3 mb-5">login terlebih dahulu</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
