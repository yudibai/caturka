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
      @isset($slider)
        <form action="{{ route('admin.slider.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
      @else
        <form action="{{ route('admin.slider.create')}}" method="POST" enctype="multipart/form-data">
      @endisset
        {{ csrf_field() }}
        <div class="card-header">
        <h3 class="card-title">Form Slider </h3>
        </div>
        <form>
        <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">title</label>
          <input type="text" class="form-control" name="title" value="{{ old('title', $slider->title ?? '') }}" placeholder="Enter Title">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">subtitle</label>
          <input type="text" class="form-control" name="sub_title" value="{{ old('sub_title', $slider->sub_title ?? '') }}" placeholder="Enter Sub Title">
        </div>
          <div class="form-group">
            <label>Photo</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile" name="imageFileName">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            @if ($slider->image ?? '')
              <img style="padding:7px 0; width:10%;" src="{{ asset('/assets/images/'. $directorySpecial .'/'. old('image', $slider->image ?? ''))}}">
            @endif
          </div>
        
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
        </div>
     
        </div>
        
          
        </form>
        </div>

  </section>


  <!-- /.content -->

@endsection()