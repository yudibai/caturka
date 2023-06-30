@extends('admin.layout.index')

@section('title', 'Dashboard')

@section('content')


  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid" >
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DataTables</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section style="padding: 10px">
    <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Form Users</h3>
        </div>
        <form>
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Username </label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
          </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Username </label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
          </div>
        
        <div class="input-group-append">
          <button type="submit" class="btn btn-primary">
            <a href="{{url('/admin/users')}}" style="color: white">
              Submit
            </a>
          </button>
        </div>
        </div>
        </div>
     
        </div>
        
        <div class="card-footer">
          <a href="{{url('/admin/users')}}">
            <button type="submit" class="btn btn-primary">Submit</button>
          </a>
        </div>
        </form>
        </div>

  </section>


  <!-- /.content -->

@endsection()