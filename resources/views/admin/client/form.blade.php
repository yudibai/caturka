{{-- @extends('admin.layout.index')

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
      @isset($client)
        <form action="{{ route('admin.client.update', $client->id)}}" method="POST">
      @else
        <form action="{{ route('admin.client.create')}}" method="POST">
      @endisset
          {{ csrf_field() }}
        <div class="card-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $client->name ?? '') }}" placeholder="Enter Name">
          </div>
          <div class="input-group-append">
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
          </div>
        </div>
      </form>
    </div>
  </section>


  <!-- /.content -->

@endsection() --}}

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
      @isset($client)
        <form action="{{ route('admin.client.update', $client->id)}}" method="POST" enctype="multipart/form-data">
      @else
        <form action="{{ route('admin.client.create')}}" method="POST" enctype="multipart/form-data">
      @endisset
          {{ csrf_field() }}
        <div class="card-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $client->name ?? '') }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <div class="" style="display: flex; flex-direction: column;">
              <label>Photo</label>
              @if ($client->image ?? '')
                <img style="padding:7px 0; width:10%;" src="{{ asset('/assets/images/'. $directorySpecial .'/'. old('image', $client->image ?? ''))}}">
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