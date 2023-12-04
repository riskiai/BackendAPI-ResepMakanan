@extends('adminpage.layouts.main')
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
              <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Back</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
        <form action="{{ route('admin.user.update',['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12 ">
                      <!-- general form elements -->
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Form Edit User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                          <div class="card-body">

                            <div class="form-group custom-margin">
                              <label for="exampleInputFile">Foto Profil</label>
                              <input type="file" name="image" class="form-control" id="exampleInputFile">
                              @if($data->image)
                                 <img src="{{ asset('storage/photo-user/'.$data->image) }}" alt="" width="100">
                                 <br>
                                 <input type="checkbox" name="remove_image" id="remove_image"> Hapus gambar yang ada
                              @endif
                              @error('image')
                                 <small>{{ $message }}</small>
                              @enderror
                           </div>
                           
                           
                          

                            <div class="form-group">
                              <label for="exampleInputEmail1">Email </label>
                              <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ $data->email }}" placeholder="Enter email">
                              @error('email')
                                  <small>{{ $message }}</small>
                              @enderror
                            </div>
                         
                        
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="name" class="form-control" value="{{ $data->name }}" id="exampleInputEmail1" placeholder="Enter Name">
                                @error('name')
                                  <small>{{ $message }}</small>
                              @enderror
                              </div>
                         

                           
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                              @error('password')
                                  <small>{{ $message }}</small>
                              @enderror
                            </div>

                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
        
                            {{-- <div class="form-group">
                              <label for="exampleInputFile">File input</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="exampleInputFile">
                                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                  <span class="input-group-text">Upload</span>
                                </div>
                              </div>
                            </div> --}}
                          
                          <!-- /.card-body -->
          
                        
                        </form>
                      </div>
                      <!-- /.card -->
          
                    </div>
                    <!--/.col (left) -->
                  </div>
            </form>
         
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

  </div>

@endsection