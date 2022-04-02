@extends('backend.layouts.master')

@section('title', 'Tambah Transaksi Penjualan')

@section('content')

<div class="container">
    <div class="row">
        <div class="container-fluid">
            <h1 class="mt-3">Add Sales Transaction Data</h1>
            @if($errors->any())
              <div class="alert alert-danger">
                  <li>
                    @foreach(@errors->all() as $error)
                    <ul>{{ $error }}</ul>
                    @endforeach
                  </li>
              </div>
              @endif
            <form method="post" action="{{url('/sales')}}">
            @csrf
            <div class="card card-default">
            <div class="card-body">

                <div class="mb-3">
                    <label for="id_produk" class="form-label">Product</label>
                    <select name="id_produk" class="form-control">
                        <option value="">-- Select Product --</option>
                        @foreach($products as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_produk }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="total_item" class="form-label">Total item</label>
                    <input type="text" class="form-control @error('total_item') is-invalid @enderror" id="total_item" placeholder="Input your total item here . . ." name="total_item"  value="{{ old('total_item') }}">
                    @error('total_item')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>



                <div class="mb-3">
                    <label for="diskon" class="form-label">Diskon</label>
                    <input type="text" class="form-control @error('diskon') is-invalid @enderror" id="diskon" placeholder="Input your diskon here . . ." name="diskon"  value="{{ old('diskon') }}">
                    @error('diskon')
                    <div id="validationServerUsernameFeedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                
                <p class=" text-gray">*membership mendapat potongan sebesar 10%</p>

               

                <button type="submit" class="btn btn-primary">Add Sales Transaction Data</button>
                <a href="{{url('/sales')}}" class="btn btn-succes">Back</a>
                </div></div>
            </form>

        </div>
    </div>
</div>
@endsection