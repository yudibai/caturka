@extends('admin.layout.index')
@section('title', 'Dashboard')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid" >
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Datatables Production</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section style="padding: 10px">
    <div class="card" >
      <div class="card-header">
      <h3 class="card-title">Striped Full Width Table</h3>
      </div>
      
      <div class="card-body p-0">
      <table class="table table-striped">
      <thead>
        <tr>
          <th >id</th>
          <th>name</th>
          <th>created_at</th>
          <th>update_at</th>
          <th>edit</th>
        </tr>
      </thead>
      <tbody>
      <tr>
        <td>1.</td>
        <td>Update software</td>
        <td>
         example@gmail.com
        </td>
        <td>Lorem ipsum dolor </td>


        <td>
          <a href="{{url('/admin/formProduct')}}" style="color: green">
            <i class="fa fa-edit"></i> 
          </a>
          <a href="{{url('/admin/formUser')}}" style="color: red">
            <i class="fa fa-trash"></i>
          </a>
        </td>
      </tr>
      <tr>
      </tbody>
      </table>
      </div>
      
      </div>
  </section>

@endsection()