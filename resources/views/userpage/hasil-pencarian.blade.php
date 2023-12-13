@extends('userpage.layouts.main')
@section('content')
<main>
    <section id="hasil-pencarian">
        <div class="container mt-5">
              <form action="{{route('resep.search')}}" class="pb-5 pt-5" method="POST">
                @csrf
                @method('GET')
                <div class="input pt-2">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text"  placeholder="cari resep" name="search">
                </div>
            </form>

            <h5><b>{{$searchInput}}</b> <br>Hasil Pencarian: {{$recipes->count()}}</h5>
            <div class="row mt-5 mb-5">
                @if ($recipes->count() > 0)
                @foreach ($recipes as $item )
                <div class="d-flex flex-colum card-artikel p-3 mb-3">
                    <div class="col-4">
                        <img class="w-100" src="{{ asset('storage/photo-resep/' . $item->image) }}" alt="nasi-goreng">
                    </div>
                    <div class="col-8 ps-3">
                        <a class="stretched-link" href="{{route('detail-resep',$item->id)}}">{{$item->judul}}</a>
                        <p class="p-0"> {{ Illuminate\Support\Str::limit(strip_tags($item->description),100) }}</p>
                         <div class="d-flex gap-3 ">
                        <p><i class="fa-solid fa-utensils"></i> {{$item->porsi}} </p>
                        <p><i class="fa-solid fa-clock"></i> {{$item->waktu}}</p>
                        {{-- <p class="kategori">Makanan berat</p>
                        <p class="khas">Indramayu</p> --}}
                    </div>
                    <p>oleh {{$item->user->name}}</p>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </section>
</main>
@endsection
