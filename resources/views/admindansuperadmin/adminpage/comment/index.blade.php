@extends('admindansuperadmin.adminpage.layouts.main')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Halaman Comment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Comment Resep</li>
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
                {{-- <a href="{{ route('admin.article.create') }}" class="btn btn-primary mb-3">Tambah Data</a> --}}

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Comment Resep</h3>
  
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
                        <th>Nama Pengomentar</th>
                        <th>Judul Resep</th>
                        <th>Comment Resep</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $dataComment)
                      <tr>
                        <td>{{ $loop->iteration + ($data->perPage() * ($data->currentPage() - 1)) }}</td>
                        
                        <td>{{ $dataComment->user->name }}</td>
                        <td>{{ $dataComment->resep->judul }}</td>
                        {{-- <td>{{ $dataComment->resep->judul }}</td> --}}
                        <td>{!! $dataComment->comment_resep !!}</td>
                        <td>
                            <a data-toggle="modal" data-target="#modal-hapus{{ $dataComment->id }}" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>Delete
                            </a>
                        </td>
                    </tr>
                  
                        <div class="modal fade" id="modal-hapus{{  $dataComment->id }}">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Apakah Kamu yakin ingin menghapus data Comment Resep <b>{{  $dataComment->comment_resep }}</b></p>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <form action="{{ route('admin.comment.delete', ['id' =>  $dataComment->id]) }}" method="POST">
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