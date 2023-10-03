@extends('admin.layout.index')
@section('title', ''.$title)
@section('content')

  <section class="content-header">
    <div class="container-fluid" >
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ $title }}</h1>
        </div>
        <div class="col-sm-6">
          <div class="float-sm-right">
            <a href="{{ route('admin.service.create')}}" class="btn btn-outline-primary min-width-125" data-toggle="click-ripple" style="overflow: hidden; position: relative; z-index: 1;">Add Service</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  
  <section style="padding: 10px">
    @include('admin.layout.widget.notice')
    <div class="card">
      <div class="card-body p-0">
        <table class="table table-striped">
          <thead>
            <tr>
              <th class="text-center">Name</th>
              <th class="text-center">Created</th>
              <th class="text-center">Updated</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($service as $service)
            <tr>
                <td class="text-center" scope="row">{{ $service->name }}</td>
                <td class="text-center">{{ Carbon::parse($service->created_at)->format('l, d F Y') }}</td>
                <td class="text-center">{{ $service->updated_at ? Carbon::parse($service->updated_at)->format('l, d F Y') : 'not yet updated' }}</td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="{{ action('App\Http\Controllers\ServiceController@update', $service->id) }}" class="btn btn-success btn-flat">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ action('App\Http\Controllers\ServiceController@delete', $service->id) }}" class="btn btn-danger btn-flat">
                      <i class="fas fa-trash"></i>
                    </a>
                  </div>
                </td>
            </tr>
            @endforeach
          <tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

@endsection()