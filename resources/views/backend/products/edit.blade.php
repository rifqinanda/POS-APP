@extends('backend.layouts.master')

@section('content')

@section('title', 'Edit Product Data')

<div class="container">
    <div class="row">
        <div class="container-fluid">
            <h1 class="mt-3">Edit Product Data</h1>
            @if($errors->any())
              <div class="alert alert-danger">
                  <li>
                    @foreach(@errors->all() as $error)
                    <ul>{{ $error }}</ul>
                    @endforeach
                  </li>
              </div>
              @endif
            <form method="post" action="{{url('/product').'/'.$products->id}}">
            @method('patch')
            @csrf
            <div class="card card-default">
            <div class="card-body">

                <div class="mb-3">
                    <label for="nama_produk" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" placeholder="Input your nama produk here . . ." name="nama_produk"  value="{{ $products->nama_produk }}">
                    @error('nama_produk')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="id_kategori" class="form-label">Branch ID</label>
                    <select name="id_kategori" class="form-control">
                        <option disables value>{{ $products->categories->nama_kategori }}</option>
                        @foreach($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" class="form-control-file" id="category_old" name="category_old" value="{{$products->id_kategori}}">
                </div>

                <div class="mb-3">
                    <label for="merk" class="form-label">Brand</label>
                    <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk" placeholder="Input Brand here . . ." name="merk" value="{{ $products->merk}}">
                    @error('merk')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="harga_beli" class="form-label">Harga Belo</label>
                    <input type="text" class="form-control @error('harga_beli') is-invalid @enderror" id="harga_beli" placeholder="Input Harga beli here . . ." name="harga_beli" value="{{ $products->harga_beli }}">
                    @error('harga_beli')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="diskon" class="form-label">Diskon</label>
                    <input type="text" class="form-control @error('diskon') is-invalid @enderror" id="diskon" placeholder="Input Additional Sunday Price here . . ." name="diskon" value="{{ $products->diskon }}">
                    @error('diskon')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="harga_jual" class="form-label">Harga Jual</label>
                    <input type="text" class="form-control @error('harga_jual') is-invalid @enderror" id="harga_jual" placeholder="Input Additional harga jual here . . ." name="harga_jual" value="{{ $products->harga_jual }}">
                    @error('harga_jual')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Input Additional Sunday Price here . . ." name="stok" value="{{ $products->stok }}">
                    @error('stok')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Change data</button>
                <a href="{{url('/product')}}" class="btn btn-succes">Back</a>
                </div></div>
            </form>

        </div>
    </div>
</div>

@endsection