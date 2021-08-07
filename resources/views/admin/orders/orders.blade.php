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
                <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Item ID</th>
                      <th>Status</th>
                      <th>Order Date</th>
                      <th width="30%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $order)
                      <tr>
                        <td><a href="#">{{$order->id}} </a></td>
                        <?php
                        ?>
                        <td>{{$order->product_id}}</td>
                        <td>
                          @if($order->status==0)
                             <span class="badge badge-warning">processing</span>
                           @else   
                           <span class="badge badge-success">delivered</span>

                          @endif  
                        </td>
                        <td>
                          <div class="sparkbar" data-color="#00a65a" data-height="20">{{$order->order_date}}</div>
                        </td>
                        <td>
                          @if($order->status==0)
                          <a class="badge badge-info p-2" href="{{ route('orders.update',$order->id) }}"
                            onclick="event.preventDefault();
                                         document.getElementById('order_update').submit();">
                           <i class="fa fa-check"></i>
                            delivered
                         </a>                       
                            <span><a href="{{route('orders.show',$order->id)}}" class="badge badge-secondary p-2"><i class="fa fa-eye"></i> show details</a></span>
                            
                            {{-- <a class="badge badge-danger p-2" href="{{ route('orders.destroy',$order->id) }}"
                               onclick="event.preventDefault();
                                if(confirm('voulez vous vraiment supprimer cet elemet ?'))          
                                  document.getElementById('order_delete').submit();">
                              <i class="fa fa-trash"></i>
                               remove order
                            </a> --}}

                            <form id="cat_delete" action="{{route('orders.destroy',$order->id)}}" method="post" class="form-inline ms-2" style="display: inline">
                              @csrf
                              <button type="submit" class="badge badge-danger p-2" style="border: none"> <i class="fa fa-trash"></i>remove order</button>
                              @method("DELETE")
                            </form>
                              
                             @else
                             <span class="badge badge-success"><i class="fa fa-check"></i> the product has been delivered</span>
                             <span><a href="{{route('orders.show',$order->id)}}" class="badge badge-info"><i class="fa fa-eye"></i> show details</a></span>


                            @endif  
                         </td>
                        </td>
                      </tr> 
                      

                      <form id="order_update" action="{{route('orders.update',$order->id)}}" method="post" class="form-inline ms-2" style="display: inline;padding:0">
                        @csrf
                        @method("PUT")
                    </form>   
                      @endforeach
                    
                      

                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                Total orders :<strong>{{count($orders)}}</strong>
              </div>
              <!-- /.card-footer -->
            </div>
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
