@extends('admindansuperadmin.auth.layouts.main_register')
@section('content')

<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ route('register') }}" class="h1"><b>YOMASAK</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg"> <strong>Halaman Register</strong> </p>
  
        <form action="{{ route('register-proses') }}" method="post">
            @csrf

            <div class="mb-3">
                <div class="input-group">
                  <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>
                @error('name')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            
            <div class="mb-3">
              <div class="input-group">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              @error('email')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            
            <div class="mb-3">
              <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              @error('password')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            
            <div class="row">
              <div class="col-8">
                {{-- <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember">
                    Remember Me
                  </label>
                </div> --}}
              </div>
              <!-- /.col -->
              <div class="col-12 mb-3">
                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          
          
  
        {{-- <p class="mb-1">
          <a href="#">I forgot my password</a>
        </p> --}}
        <p class="mb-0">
          <a href="{{ route('login') }}" class="text-center">Akun Sudah Ada ? Login Sekarang</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

@endsection