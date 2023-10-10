<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ckaprinting</title>

  <link href="/assets/img/Screenshot_2023-06-21_at_23.55.06-removebg-preview.png" rel="icon">
  <link href="/assets/img/Screenshot_2023-06-21_at_23.55.06-removebg-preview.png" rel="apple-touch-icon">

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

  <link rel="stylesheet" href="{{asset('assets/client/css/style.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">

</head>
<body class="hold-transition sidebar-mini">
  <header id="header" class="fixed-top d-flex align-items-center " >
    <div class="col-lg-12 d-flex align-items-center justify-content-between" style="padding-right: 30px">
    
      <a class="navbar-brand"  href="{{url('/')}}" style="display: flex;
    
      align-items: center;"> <img src="/assets/client/img/Screenshot_2023-06-21_at_23.55.06-removebg-preview.png" alt="" style="height: auto; width: 100%; max-width: 5vw; "> <span style="font-family: 'Montserrat'; font-weight: 1000; font-size: 2.5vw;font-weight: 500;margin-left:10px;">PT CATUR KREASI AKSARA </span> </a>
      
      <nav id="navbar" class="navbarResponsive" >
          <ul>
            <li><a class="nav-link" href="{{url('/')}}">Beranda</a></li>
            <li><a class="nav-link" href="{{url('/product')}}">Layanan Kami</a></li>
            <li><a class="nav-link" href="{{url('/equipment')}}">Equipment</a></li>
            <li><a class="nav-link" href="{{url('/contact')}}">Hubungi Kami</a></li>
            <li><a class="nav-link" href="{{url('/about')}}">Tentang Kami</a></li>
          </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>

  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <ol>
        <li>Home</li>
        <li>Product</li>
        <li>{{ $product->name }}</li>
      </ol>
      <h2>Portfolio Details</h2>
    </div>
  </section>

  <section id="portfolio-details" class="portfolio-details">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-8">
          <div class="portfolio-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">
                <img src="{{ asset('/assets/images/products/'. $product->image)}}">
              </div>

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>Project information</h3>
            <ul>
              <li><strong>Category</strong>:{{$product->sub_name}}</li>
              <li><strong>Client</strong>: {{$product->name}}</li>
            </ul>
          </div>
          <div class="portfolio-description" >
              
            <div class="container">
              <b> Ukuran Efektif:
                                <div class="col-lg-12 " style="margin: auto; padding-top: 10px; font-weight: 400">
                <div class="column text-center" style="margin-bottom: 10px;">
                  <div class="col-lg-12 col-md-8 col-sm-8 border text-center" style="height: 80px;">
                    Ukuran 27.2cm x 38cm (ukuran bahan)
                  </div>
                  <div class="col-lg-12 col-md-8 col-sm-8 border"  style="height: 80px;">
                    Ukuran 35cm x 39cm (ukuran bahan)
                  </div>
                </div>

                <b> Ukuran Khusus 
                  :
                  <div class="col-lg-12 " style="margin: auto; padding-top: 10px;font-weight: 400">
                  <div class="column text-center" style="margin-bottom: 10px;">
                    <div class="col-lg-12 col-md-8 col-sm-8 border text-center" style="height: 80px;">
                      Max ukuran bahan 36cm x 51cm

                    </div>
                    <div class="col-lg-12 col-md-8 col-sm-8 border"  style="height: 80px;">
                      Max ukuran bahan 51cm x 72cm
                    </div>
                  </div>

                <p>Untuk ukuran lainnya, Silahkan kirim pesan melalui tombol di bawah <b>Kirim pesan</b></p>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="background-color: #691a1d; color: white; width: auto; height: 50px; font-size: 12px;border: none;">Kirim Pesan</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label for="receiptment" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="receiptment">
                          </div>
                          <div class="form-group">
                            <label for="message-text" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message-text-po"></textarea>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="height: 36px">Close</button>
                        <button type="button" class="btn btn-primary" onclick="sendMailPO()"  style="background-color: #691a1d; color: white; border: none;" >Send message</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

<!-- AdminLTE App -->
<script>
  function sendMailPO() {
  
  const valueName = document.getElementById('receiptment').value
  const valueMessage = document.getElementById('message-text-po').value

  const valueEmail = `${valueName}\n${valueMessage}\n`

  var link = "mailto:po@domain;"
          + "?cc="
           + "&subject=" + encodeURIComponent(valueName)
           + "&body=" + encodeURIComponent(valueEmail)
  
  window.location.href = link;
}
</script>
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

<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
<script src="/assets/client/js/main.js"></script>
<script>
 
</script>
</body>
</html>






