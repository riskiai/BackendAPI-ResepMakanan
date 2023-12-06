@extends('adminpage.auth.layouts.main')
@section('content')

<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ route('login') }}" class="h1"><b>Admin</b>Page</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Halaman Login</p>
  
        <form action="{{ route('login-proses') }}" method="post">
            @csrf
            
            <div class="mb-3">
              <div class="input-group">
                <input type="email" name="email" class="form-control" placeholder="Email">
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
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          
    {{--   
        <p class="mb-1">
          <a href="#">I forgot my password</a>
        </p> --}}
        <p class="mb-0">
          <a href="{{ route('register') }}" class="text-center">Register new member</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

@endsection