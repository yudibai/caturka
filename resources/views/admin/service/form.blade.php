@extends('admin.layout.index')

@section('title', ''.$title)

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid" >
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ $title }}</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section style="padding: 10px">
    @include('admin.layout.widget.notice')
    <div class="card card-primary">
      @isset($service)
        <form action="{{ route('admin.service.update', $service->id)}}" method="POST" enctype="multipart/form-data">
      @else
        <form action="{{ route('admin.service.create')}}" method="POST" enctype="multipart/form-data">
      @endisset
          {{ csrf_field() }}
        <div class="card-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $service->name ?? '') }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label>Description</label>
            <input type="text" class="form-control" name="description" value="{{ old('description', $service->description ?? '') }}" placeholder="Enter description">
          </div>
          <div class="form-group">
            <div class="" style="display: flex; flex-direction: column;">
              <label>Photo</label>
              @if ($service->image ?? '')
                <img style="padding:7px 0; width:10%;" src="{{ asset('/assets/images/'. $directorySpecial .'/'. old('image', $service->image ?? ''))}}">
              @endif
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" name="imageFileName">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </section>
@endsection()