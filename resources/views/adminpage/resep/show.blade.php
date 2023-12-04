@extends('adminpage.layouts.main')
@section('content')

<div class="content-wrapper">
    <!-- Konten Header (Page header) -->
     <!-- Content Header (Page header) -->
     <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Detail Resep</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Detail Resep</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
    <!-- ... (kode yang sudah ada sebelumnya) ... -->
    <!-- Konten Utama -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- ... (kode yang sudah ada sebelumnya) ... -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pembuat</th>
                                    <th>Photo</th>
                                    <th>Judul</th>
                                    <th>Description</th>
                                    <th>Durasi Masak</th>
                                    <th>Bahan Dan Langkah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>{{ $data->user->name }}</td>
                                    <td>
                                        @if($data->image)
                                            <img src="{{ asset('storage/photo-resep/' . $data->image) }}" alt="" width="50">
                                        @else
                                            <span>Tidak Ada Gambar</span>
                                        @endif
                                    </td>
                                    <td>{{ $data->judul }}</td>
                                    <td>{{ $data->description }}</td>
                                    <td>{{ $data->waktu }}</td>
                                    <td>{{ $data->bahan_langkah }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- ... (kode yang sudah ada sebelumnya) ... -->

                <!-- Form Komentar -->               
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.resep.addComment', ['id' => $data->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="comment">Tambahkan Komentar</label>
                                <textarea class="form-control" name="comment" id="comment" rows="3" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim Komentar</button>
                        </form>
                    </div>
                </div>

                <!-- Daftar Komentar -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"> <strong>Komentar User :</strong> </h5>
                        <br> 
                        @foreach($data->comments as $comment)
                            <p> <strong style="font-size: 20px"> {{ $comment->user->name }} </strong> :  {{ $comment->comment_resep }}</p>
                        @endforeach
                    </div>
                </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
