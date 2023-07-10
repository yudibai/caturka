@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@elseif (Session::has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{-- <h4><i class="icon fa fa-check"></i> Alert!</h4> --}}
        {{ Session::get('success') }}
        @php
            Session::forget('success');
        @endphp
    </div>
@elseif (Session::has('info'))
    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ Session::get('info') }}
        @php
            Session::forget('info');
        @endphp
    </div>
@elseif (Session::has('danger'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {{ Session::get('danger') }}
        @php
            Session::forget('danger');
        @endphp
    </div>
@endif