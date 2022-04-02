@extends('backend.layouts.master')

@section('content')

@section('title', 'Sales Menu')

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sales Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

    <!-- Main content -->
<section class="content">


      <!-- Default box -->
      
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">
    <a href="{{url('/sales/create')}}" class="btn btn-primary btn-sm" class="mt-3"><i class="fa fa-plus"></i> Add</a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Produk</th>
                      <th>Total Item</th>
                      <th>Total Harga</th>
                      <th>Diskon</th>
                      <th>Total Bayar</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                    
                    @foreach($sales as $pdt => $data)
                      
                      <th>{{ $loop->iteration}}</th>
                      <td>{{ $data->products->nama_produk }}</td>
                      <td>{{ $data->total_item }}</td>
                      <td>@currency($data->total_item * $data->products->harga_jual)</td>
                      <td>{{ $data->diskon }} %</td>
                      <!-- <td>@currency($data->total_item * $data->products->harga_jual * $data->diskon / 100)</td> -->
                      <input type="hidden" value="{{ $disc = $data->total_item * $data->products->harga_jual * $data->diskon / 100 }}">
                      <td>@currency($data->total_item * $data->products->harga_jual - $disc)</td>
                      <td>
                            <a href="{{url('/sales').'/'.$data->id.('/edit')}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="{{url('/sales').'/'.$data->id.('/download')}}" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                            <!-- <a href="{{url('/product').'/'.$data->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a> -->
                            <form action="{{url('/sales').'/'.$data->id}}" method="post" class="d-inline" onsubmit="return confirm('Are you sure ?')">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
                <p class="my-2 ml-2 text-gray">*membership mendapat potongan sebesar 10%</p>
              </div>
              <!-- /.card-body -->
            </div>
      
      <!-- /.card -->

</section>
<script src="{{asset('https://kit.fontawesome.com/12869f30a4.js')}}" crossorigin="anonymous"></script>

@endsection