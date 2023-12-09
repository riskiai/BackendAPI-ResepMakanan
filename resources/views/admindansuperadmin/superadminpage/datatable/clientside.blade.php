@extends('admindansuperadmin.layouts.main')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
@endsection
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Table (Client Side User)</li>
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
                {{-- <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">Tambah Data</a> --}}

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data User</h3>
  
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap" id="clientside">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Photo</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $dataUser)
                        <tr>
                          <td>{{ $loop->iteration }}</td>

                            <td>
                              @if($dataUser->image)
                                   <img src="{{ asset('storage/photo-user/' . $dataUser->image) }}" alt="" width="50">
                              @else
                                  <img src="{{ asset('assets/image/gambar.jpg') }}" width="50" alt="not image">
                              @endif
                            </td>
                            <td>{{ $dataUser->name }}</td>
                            <td>{{ $dataUser->email }}</td>
                            <td>
                                <a href="{{ route('superadmin.user.edit', ['id' => $dataUser->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                                <a data-toggle="modal" data-target="#modal-hapus{{ $dataUser->id }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i>Delete</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="modal-hapus{{ $dataUser->id }}">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Konfirmasi Hapus Data</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>Apakah Kamu yakin ingin menghapus data user <b>{{ $dataUser->name }}</b></p>
                              </div>
                              <div class="modal-footer justify-content-between">
                                <form action="{{ route('superadmin.user.delete', ['id' => $dataUser->id]) }}" method="POST">
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

                {{-- <div class="mt-3 ml-3">
                  {{ $data->onEachSide(2)->links() }}
                </div> --}}
              
              
                
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

{{-- Pemanggilan Script Data Table --}}
@section('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <script>
      $(document).ready( function () {
          $('#clientside').DataTable();
      } );
    </script>
@endsection