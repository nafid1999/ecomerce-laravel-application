@extends('layouts.admin_layouts.admin_layout')
@section('title','Categories')

@section('content')

<div class="content-wrapper">
 <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Categories</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                <li class="breadcrumb-item active">Categories</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
  </section>

  <section class="content mx-auto">
    <div class="container">
      <div class="row justify-content-center ">
        <!-- left column -->
        <div class="col-md-7">
          @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible show fade">
                  {{session()->get('success')}}
                  <button type="button" class="close" data-dismiss="alert" area-labe="Close" role="alert">
                    <span area-hidden='true'>&times;</span>
                </button> 
              </div>
         @endif
          <!-- general form elements -->
          <div class="card  ">
            <div class="card-header">
            <h3 class="card-title text-bold">Add new Category </strong></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{route('categorie.store')}} " enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Title :</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror " id="exampleInputEmail1" placeholder="Title of category" name="title" >
                  @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Description :</label>
                  <div class="mb-3">
                      <textarea class="textarea @error('description') is-invalid @enderror" placeholder="Place some text here"
                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" 
                                name="description">
                      </textarea>
                      @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                  </div>      
               </div>
                 
                <div class="form-group">
                  <label for="File">Category Icon:</label>
                   <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image">
                   @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
               
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn  btn-block" style="background-color: #ff4500;color:white">edit product</button>
              </div>

            </form>
          </div>
        </div>
    </div>
  </div>
</div>

  @endsection