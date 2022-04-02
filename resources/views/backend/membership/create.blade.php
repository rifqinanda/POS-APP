@extends('backend.layouts.master')

@section('title', 'Add Membership')

@section('content')

<div class="container">
    <div class="row">
        <div class="container-fluid">
            <h1 class="mt-3">Add Membership Data</h1>
            @if($errors->any())
              <div class="alert alert-danger">
                  <li>
                    @foreach(@errors->all() as $error)
                    <ul>{{ $error }}</ul>
                    @endforeach
                  </li>
              </div>
              @endif
            <form method="post" action="{{url('/membership')}}">
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
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" placeholder="Input your telepon here . . ." name="telepon"  value="{{ old('telepon') }}">
                    @error('telepon')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="textarea" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Input your alamat here . . ." name="alamat"  value="{{ old('alamat') }}">
                    @error('alamat')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Add Membership</button>
                <a href="{{url('/membership')}}" class="btn btn-succes">Back</a>
                </div></div>
            </form>

        </div>
    </div>
</div>
@endsection