<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ckaprinting</title>

  <link href="assets/client/img/Screenshot_2023-06-21_at_23.55.06-removebg-preview.png" rel="icon">
  <link href="assets/client/img/Screenshot_2023-06-21_at_23.55.06-removebg-preview.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="{{ asset('assets/client/vendor/animate.css/animate.min.css')}} " rel="stylesheet">
  <link href="{{ asset('assets/client/vendor/aos/aos.css')}} " rel="stylesheet">
  <link href="{{ asset('assets/client/vendor/bootstrap/css/bootstrap.min.css')}} " rel="stylesheet">
  <link href="{{ asset('assets/client/vendor/bootstrap-icons/bootstrap-icons.css')}} " rel="stylesheet">
  <link href="{{ asset('assets/client/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/client/vendor/glightbox/css/glightbox.min.css')}} " rel="stylesheet">
  <link href="{{ asset('assets/client/vendor/remixicon/remixicon.css')}} " rel="stylesheet">
  <link href="{{ asset('assets/client/vendor/swiper/swiper-bundle.min.css')}} " rel="stylesheet">
  <link href="https://fonts.cdnfonts.com/css/elegant-2" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/client/css/style.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
  <title>App Name - @yield('title')</title>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('client.layout.navbar')
  @yield('content')
  @include('client.layout.footer')
</div>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/client/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script src="{{ asset('assets/client/vendor/aos/aos.js')}} "></script>
<script src="{{ asset('assets/client/vendor/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
<script src="{{ asset('assets/client/vendor/glightbox/js/glightbox.min.js')}} "></script>
<script src="{{ asset('assets/client/vendor/isotope-layout/isotope.pkgd.min.js')}} "></script>
<script src="{{ asset('assets/client/vendor/swiper/swiper-bundle.min.js')}} "></script>
<script src="{{ asset('assets/client/vendor/php-email-form/validate.js')}} "></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
<script src="assets/client/js/main.js"></script>
<script>
 
</script>
</body>
</html>
