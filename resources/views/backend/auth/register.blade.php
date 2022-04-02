
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/adminlte/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{url('/')}}"><b>Regis</b>ter</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
      @if($errors->any())
      <div class="alert alert-danger">
          <li>
            @foreach(@errors->all() as $error)
            <ul>{{ $error }}</ul>
            @endforeach
          </li>
      </div>
      @endif
      <form action="{{ route('saveregister') }}" method="post">
      {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Full name" value="{{ old('name') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('name')
          <div id="validationServerUsernameFeedback" class="invalid-feedback">
          {{$message}}
          </div>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
          <div id="validationServerUsernameFeedback" class="invalid-feedback">
          {{$message}}
          </div>
          @enderror
        </div>

        <div class="input-group mb-3">
          <select name="role" class="form-control">
            <option value="admin">Admin</option>
            <option value="user">User</option>
          </select>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
          <div id="validationServerUsernameFeedback" class="invalid-feedback">
          {{$message}}
          </div>
          @enderror
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" value="{{ old('password_confirmation') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password_confirmation')
          <div id="validationServerUsernameFeedback" class="invalid-feedback">
          {{$message}}
          </div>
          @enderror
        </div>
        <div class="row">

          
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      <a href="{{url('/login')}}" class="text-center">I already have an account</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('/adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/adminlte/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
