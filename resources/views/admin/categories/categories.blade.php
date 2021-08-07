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
                  <h3 class="card-title">Liste of categories</h3>
                  <a href="{{route('categorie.create')}} " class="btn btn-success float-right"><i class="fa fa-plus"></i>  Add a new category</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table  class="table  table-condensed ">
                    <thead>
                    <tr>
                      <th>#ID</th>
                      <th >Title</th>
                      <th class="justify-content-center d-flex" width="20%">Icon</th>
                      <th>Acion</th>
                   
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                              <td>{{$category->id}} </td>
                              <td>{{$category->name}} </td>
                              <td class=""><img src="{{asset($category->image)}} " alt="{{$category->name}}" style="width: 100px"> </td>
                              <td width="25%">
                                <a href="{{route('categorie.edit',$category->id)}}" class="badge badge-warning p-2"><i class="fa fa-edit"></i> Edit category</a>

                                {{-- <a class="badge badge-danger p-2" href="{{ route('categorie.index') }}"
                                  onclick="event.preventDefault();
                                     if(confirm('voulez vous vraiment supprimer cet elemet ?'))          
                                     document.getElementById('cat_delete').submit();">
                                 <i class="fa fa-trash"></i>
                                  remove category
                               </a> --}}
                               <form id="cat_delete" action="{{route('categorie.destroy',$category->id)}}" method="post" class="form-inline ms-2" style="display: inline">
                                  @csrf
                                  <button type="submit" class="badge badge-danger p-2" style="border: none"> <i class="fa fa-trash"></i>remove category</button>
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
