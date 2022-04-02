@extends('backend.layouts.master')

@section('content')

@section('title', 'Edit Category Data')

<div class="container">
    <div class="row">
        <div class="container-fluid">
            <h1 class="mt-3">Edit Category Data</h1>
            @if($errors->any())
              <div class="alert alert-danger">
                  <li>
                    @foreach(@errors->all() as $error)
                    <ul>{{ $error }}</ul>
                    @endforeach
                  </li>
              </div>
              @endif
            <form method="post" action="{{url('/category').'/'.$category->id}}">
            @method('patch')
            @csrf
            <div class="card card-default">
            <div class="card-body">

                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Category</label>
                    <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" placeholder="Input your Category here . . ." name="nama_kategori"  value="{{ $category->nama_kategori }}">
                    @error('nama_kategori')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Change data</button>
                <a href="{{url('/category')}}" class="btn btn-succes">Back</a>
                </div></div>
            </form>

        </div>
    </div>
</div>

@endsection