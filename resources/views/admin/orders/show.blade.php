@extends('layouts.admin_layouts.admin_layout')
@section('title',$title)
@section('content')
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>{{$title}}</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
  </section>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Order's details : <strong>{{$order->id}}</strong></h3>
                  <a href="{{route("orders.index")}} " class="btn btn-dark float-right"><i class="fa fa-angle-left"></i>  back</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="cart" class="table table-hover table-condensed">
                    <thead>
                    <tr>
                        <th style="width:10%">ID Order</th>
                        <th style="width:30%">Product</th>
                        <th style="width:15%">Price</th>
                        <th style="width:13%">Quantity</th>
                        <th style="width:22%" class="text-center">Total Price</th>
                        <th style="width:10%"></th>
                    </tr>
                    </thead>
                    <tbody>
            
            
                   
                        @foreach($products as $product)
                                @if($product->id==$order->product_id)
                                    <tr>
                                      <td data-th="Price">{{$order->id}}</td>

                                        <td data-th="Product">
                                            <div class="row">
                                              <div class="col-sm-3 hidden-xs"><img src="{{asset($product->image)}}" width="50" height="50" class="img-responsive"/></div>
                                              <div class="col-sm-9">
                                                  <h5 class="nomargin">{{ $product->title }}</h5>
                                              </div>
                                            </div>
                                        </td>
                                        <td data-th="Price">${{ $product->price }}</td>
                                        <td data-th="Quantity">
                                            {{ $product->id }}
                                        </td>
                                        <td data-th="Subtotal" class="text-center">${{ $product->id*$product->price }}</td>
                   
                                    </tr>

                                @endif
            
                        @endforeach

            
                    </tbody>
                    
                </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
   </div>

@endsection
