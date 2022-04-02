@extends('backend.layouts.master')

@section('title', 'Add Users')

@section('content')

<div class="container">
    <div class="row">
        <div class="container-fluid">
            <h1 class="mt-3">Add Users Data</h1>
           @if($errors->any())
              <div class="alert alert-danger">
                  <li>
                    @foreach(@errors->all() as $error)
                    <ul>{{ $error }}</ul>
                    @endforeach
                  </li>
              </div>
              @endif
            <form method="post" action="{{url('/users')}}">
            @csrf
            <div class="card card-default">
            <div class="card-body">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Input your name here . . ." name="name"  value="{{ old('name') }}">
                    @error('name')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                

                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" class="form-control">
                        <option value="">-- Select Role --</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Input your Email here . . ." name="email"  value="{{ old('email') }}">
                    @error('email')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Input your password here . . ." name="password" value="{{ old('password') }}">
                    @error('password')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Input your your password confirmation here . . ." name="password_confirmation" value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Users</button>
                <a href="{{url('/users')}}" class="btn btn-succes">Back</a>
                </div></div>
            </form>

        </div>
    </div>
</div>
@endsection