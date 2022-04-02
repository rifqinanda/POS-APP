@extends('backend.layouts.master')

@section('title', 'Add Product')

@section('content')

<div class="container">
    <div class="row">
        <div class="container-fluid">
            <h1 class="mt-3">Add Product Data</h1>
            @if($errors->any())
              <div class="alert alert-danger">
                  <li>
                    @foreach(@errors->all() as $error)
                    <ul>{{ $error }}</ul>
                    @endforeach
                  </li>
              </div>
              @endif
            <form method="post" action="{{url('/product')}}">
            @csrf
            <div class="card card-default">
            <div class="card-body">

                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" placeholder="Input your nama produk here . . ." name="nama_produk"  value="{{ old('nama_produk') }}">
                    @error('nama_produk')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                

                <div class="mb-3">
                    <label for="id_kategori" class="form-label">Category</label>
                    <select name="id_kategori" class="form-control">
                        <option disabled value>Pilih Kategori</option>
                        @foreach($category as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="merk" class="form-label">Brand</label>
                    <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk" placeholder="Input your brand here . . ." name="merk"  value="{{ old('merk') }}">
                    @error('merk')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="harga_beli" class="form-label">Harga Beli</label>
                    <input type="text" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" placeholder="Input your harga beli here . . ." name="harga_beli" value="{{ old('harga_beli') }}">
                    @error('harga_beli')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="diskon" class="form-label">Diskon</label>
                    <input type="text" class="form-control @error('diskon') is-invalid @enderror" id="diskon" placeholder="Input your discount here . . ." name="diskon" value="{{ old('diskon') }}">
                    @error('diskon')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                    <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" placeholder="Input your harga jual here . . ." name="harga_jual" value="{{ old('harga_jual') }}">
                    @error('harga_jual')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Input your stok here . . ." name="stok" value="{{ old('stok') }}">
                    @error('stok')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Add Product</button>
                <a href="{{url('/product')}}" class="btn btn-succes">Back</a>
                </div></div>
            </form>

        </div>
    </div>
</div>
@endsection