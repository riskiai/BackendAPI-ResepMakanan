@extends('admindansuperadmin.adminpage.layouts.main')
@section('css')
<style>
   .description-cell {
    max-height: 60px; /* Adjust the height as needed */
    overflow-y: auto;
}
</style>
@endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Resep</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Resep</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                {{-- Create Data Baru --}}
                <a href="{{ route('admin.resep.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Article</h3>
  
                  <div class="card-tools">

                    {{-- Filter Data --}}
                    <form action="{{ route('admin.article.index') }}" method="GET">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ $request->get('search') }}">
                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                
                  </div>
                </div>
                <!-- /.card-header -->
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
                        <th>Porsi</th>
                        <th>Bahan Dan Langkah</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $dataResep)
                        <tr>
                          <td>{{ $loop->iteration + ($data->perPage() * ($data->currentPage() - 1)) }}</td>
                          <td>{{ $dataResep->user->name }}</td>

                            <td>
                              @if($dataResep->image)
                                   <img src="{{ asset('storage/photo-resep/' . $dataResep->image) }}" alt="" width="50">
                              @else
                                  <span>Tidak Ada Gambar</span>
                              @endif
                            </td>
                            <td>{{ $dataResep->judul }}</td>
                            <td class="description-cell">
                              @php
                                  $words = explode(' ', $dataResep->description);
                                  $limitedWords = array_slice($words, 0, 10);
                                  echo implode(' ', $limitedWords);
                                  if (count($words) > 20) echo '...';
                              @endphp
                          </td>
                            <td>{{ $dataResep->waktu }}</td>
                            <td>{{ $dataResep->porsi }}</td>
                            <td>{!! $dataResep->bahan_langkah !!}</td>
                            <td>
                                <a href="{{ route('admin.resep.edit', ['id' => $dataResep->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                                <a href="{{ route('admin.resep.show', ['id' => $dataResep->id]) }}" class="btn btn-success"><i class="fas fa-eye"></i>Show</a>
                                <a data-toggle="modal" data-target="#modal-hapus{{ $dataResep->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="modal-hapus{{ $dataResep->id }}">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Apakah Kamu yakin ingin menghapus data Judul Article <b>{!!$dataResep->judul; !!}</b></p>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <form action="{{ route('admin.resep.delete', ['id' => $dataResep->id]) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Ya, Hapus Data</button>
                                </form>
                                
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                    @endforeach
                    
                    </tbody>
                  </table>
                  
                </div>

                <div class="mt-3 ml-3">
                  {{ $data->onEachSide(2)->links() }}
              </div>
              
              
                
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection