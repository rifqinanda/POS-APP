@extends('backend.layouts.master')

@section('content')

@section('title', 'Edit Data Transaksi')

<div class="container">
    <div class="row">
        <div class="container-fluid">
            <h1 class="mt-3">Edit Sales Transaction Data</h1>
            @if($errors->any())
              <div class="alert alert-danger">
                  <li>
                    @foreach(@errors->all() as $error)
                    <ul>{{ $error }}</ul>
                    @endforeach
                  </li>
              </div>
              @endif
            <form method="post" action="{{url('/sales').'/'.$sales->id}}">
            @method('patch')
            @csrf
            <div class="card card-default">
            <div class="card-body">              

                <div class="mb-3">
                    <label for="id_produk" class="form-label">Nama Produk</label>
                    <select name="id_produk" class="form-control">
                        <option disables value>{{ $sales->products->nama_produk }}</option>
                        @foreach($products as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_produk }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" class="form-control-file" id="produk_old" name="produk_old" value="{{$sales->id_produk}}">
                </div>

                 <div class="mb-3">
                    <label for="total_item" class="form-label">Total item</label>
                    <input type="text" class="form-control @error('total_item') is-invalid @enderror" id="total_item" placeholder="Input your Total item here . . ." name="total_item"  value="{{ $sales->total_item }}">
                    @error('total_item')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                 <div class="mb-3">
                    <label for="diskon" class="form-label">Diskon</label>
                    <input type="text" class="form-control @error('diskon') is-invalid @enderror" id="diskon" placeholder="Input your nama produk here . . ." name="diskon"  value="{{ $sales->diskon }}">
                    @error('diskon')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Change data</button>
                <a href="{{url('/sales')}}" class="btn btn-succes">Back</a>
                </div></div>
            </form>

        </div>
    </div>
</div>

@endsection