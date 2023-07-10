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
      @isset($user)
        <form action="{{ route('admin.user.update', $user->id)}}" method="POST">
      @else
        <form action="{{ route('admin.user.create')}}" method="POST">
      @endisset
          {{ csrf_field() }}
        <div class="card-body">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $user->name ?? '') }}" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" value="{{ old('username', $user->username ?? '') }}" placeholder="Enter Username" @isset($toReadOnly) readonly @endisset>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $user->email ?? '') }}" placeholder="Enter Email" @isset($toReadOnly) readonly @endisset>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password" autocomplete="off">
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="passwordConfirm" placeholder="Enter Confirm Password" autocomplete="off"></div>
          <div class="form-group">
            <label>Level</label>
            <select name="level" id="" class="form-control">
              <option value="">Please Select Level</option>
              @foreach ($levels as $level)
                <option value="{{ $level->name }}" {{ old('level', $user->level ?? '') == $level->name ? 'selected' : ''  }}>{{ $level->name }}</option>
              @endforeach
            </select>
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

@endsection()