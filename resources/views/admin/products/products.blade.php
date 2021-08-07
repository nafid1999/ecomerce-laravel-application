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
              @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible show fade">
                  {{session()->get('success')}}
                  <button type="button" class="close" data-dismiss="alert" area-labe="Close" role="alert">
                      <span area-hidden='true'>&times;</span>
                  </button> 
              </div>
          @endif
          @if (session()->has('danger'))
              <div class="alert alert-danger alert-dismissible show fade">
                  {{session()->get('danger')}}
                  <button type="button" class="close" data-dismiss="alert" area-labe="Close" role="alert">
                      <span area-hidden='true'>&times;</span>
                  </button> 
              </div>
          @endif
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Liste of products</h3>
                  <a href="{{route('products.create')}} " class="btn btn-success float-right"><i class="fa fa-plus"></i>  Add a new product</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table  class="table table-hover ">
                    <thead class="">
                    <tr>
                      <th>#ID</th>
                      <th>Title</th>
                      <th>Image</th>
                      <th>price</th>
                      <th>Qty</th>
                      <th>Action</th>
                   
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                              <td>{{$product->id}} </td>
                              <td> <strong>{{$product->title}} </strong></td>
                              <td> <img src="{{asset($product->image)}}" alt="{{$product->title}}" class="fluid rounded" style="width: 100px">  </td>
                              <td>{{$product->price}} $</td>
                              <td>{{$product->quantity}} </td>

                              <td width="25%">
                                <a href="{{route('products.edit',$product->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit product</a>
                                {{-- <a class="badge badge-danger p-2" href="{{ route('products.destroy',$product->id) }}"
                                  onclick="event.preventDefault();
                                   if(confirm('voulez vous vraiment supprimer ce produit ?'))          
                                     document.getElementById('product_delete').submit();">
                                 <i class="fa fa-trash"></i>
                                  Remove product
                               </a>
                                  --}}

                                  <form id="product_delete" action="{{route('products.destroy',$product->id)}}" method="post" class="form-inline ms-2" style="display: inline">
                                    @csrf
                                    <button type="submit" class="badge badge-danger p-2" style="border: none"> <i class="fa fa-trash"></i>remove product</button>
                                    @method("DELETE")
                                  </form>
                               </td>
                             
        
                            </tr> 
                            
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
