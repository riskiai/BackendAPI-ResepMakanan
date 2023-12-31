@extends('admindansuperadmin.adminpage.layouts.main')
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
              <li class="breadcrumb-item"><a href="{{ route('admin.resep.index') }}">Back</a></li>
              <li class="breadcrumb-item active">Tambah Resep</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
        <form action="{{ route('admin.resep.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12 ">
                      <!-- general form elements -->
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Form Tambah Resep</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                          <div class="card-body">

                            <div class="form-group custom-margin">
                              <label for="exampleInputEmail1">Photo Resep</label>
                              <input type="file" name="image" class="form-control " id="exampleInputEmail1" 
                              @error('image')
                                <small>{{ $message }}</small>
                            @enderror
                            </div>

                            <div class="form-group ">
                              <label for="exampleInputEmail1">Judul </label>
                              <input type="text" class="form-control" id="exampleInputEmail1" name="judul" placeholder="Enter Judul">
                              @error('judul')
                                  <small>{{ $message }}</small>
                              @enderror
                            </div>

                            <div class="form-group ">
                                <label for="exampleInputEmail1">Durasi Masak </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="waktu" placeholder="Enter Waktu">
                                @error('waktu')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>

                              <div class="form-group ">
                                <label for="exampleInputEmail1">Porsi Masak </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="porsi" placeholder="Enter Porsi Masak">
                                @error('porsi')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>

                              <div class="form-group ">
                                <label for="exampleInputEmail1">Bahan Dan Langkah </label>
                                <textarea name="bahan_langkah" id="description-ckeditor" class="ckeditor form-control my-textarea" id="exampleInputDescription" placeholder="Enter Description">{{ old('bahan_langkah') }}</textarea>
                                @error('bahan_langkah')
                                    <small>{{ $message }}</small>
                                @enderror
                              </div>
                         
                            <div class="form-group">
                                <label for="exampleInputDescription">Description</label>
                                <textarea name="description" id="description-ckeditor" class="ckeditor form-control my-textarea" id="exampleInputDescription" placeholder="Enter Description">{{ old('description') }}</textarea>
                                @error('description')
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

@section('scripts')

  <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {
        $('.ckeditor').ckeditor();
      });
  </script>

@endsection