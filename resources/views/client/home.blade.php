@extends('client.layout.index')

@section('title', 'Home')
@section('content')

<main id="main">

    <section id="hero" class="d-flex justify-cntent-center align-items-center" style="height: auto; max-height: 80vh; margin-top: 140px; transition: 0.8s;">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel"  data-interval="false">
          <div class="carousel-inner" style="height: auto;">
            @foreach ($sliders as $slider)
              <div class="carousel-item active">
                <img src="{{ asset('assets/images/sliders/' .$slider->title .'/' .$slider->image) }}" class="d-block w-100" alt="...">
              </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
          </button>
          
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
          </button>
        </div>
      </section>
  
      <section id="why-us" class="why-us" style="padding-top: 10px">
    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch" data-aos="fade-left">
          <div class="content">
            <h3><strong>PT Catur Kreasi Aksara</strong>, Solusi Printing Berkualitas</h3>
            <p>
              Berdiri dari tahun 1991, kami hadir dengan visi untuk menjadi perusahaan printing dengan kualitas terbaik di Indonesia.
            </p>
          </div>

          <div class="accordion-list" style="margin-top: 20px">
            <ul>
              <li data-aos="fade-up" data-aos-delay="100">
                <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Kualitas Printing Terbaik
                  <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                  <p>
                    Kami memiliki teknologi pencetakan mutakhir, pilihan material terbaik, dan quality control yang cermat memastikan bahwa setiap karya yang kami buat sesuai dengan keinginan client.
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="200">
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span>Pengerjaan Dalam 7 Hari Kerja
                  <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Waktu sangatlah berharga, kami siap mengerjakan pesanan anda dalam 7 hari kerja (tergantung quantity yang dipesan).
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="300">
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Harga Kompetitif
                  <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Kesempurnaan tidak harus datang dengan harga premium. Kami menawarkan printing berkualitas tinggi dengan harga yang kompetitif tanpa mengorbankan kualitas.
                  </p>
                </div>
              </li>

            </ul>
          </div>

        </div>
        <div class="col-lg-5 align-items-stretch position-relative video-box" style='padding: 10; background-image: url("assets/client/img/why-us.jpg");' data-aos="fade-right">
          <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn mb-4"></a>
        </div>

      </div>

    </div>
  </section>

  <section id="portfolio" class="portfoio">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>KATALOG</h2>
        <p>
          Dari kartu nama yang mencuri perhatian hingga brosur yang menginformasikan, hang tag yang mencolok hingga packaging, layanan pencetakan kami mencakup berbagai kebutuhan. Tidak peduli seberapa besar atau kecil kebutuhan Anda, kami adalah solusi yang tepat.
        </p>
      </div>

      <div class="row portfolio-container">
        @foreach ($products->slice(0,3) as $product )
          <div class="col-lg-4 col-md-6 col-sm-12 portfolio-item filter-app">
            <img src="{{ asset('assets/images/products/' .$product->name .'/' .$product->image) }}" class="img-fluid" alt="">
            <div class="portfolio-info">
                <h4>{{$product->sub_name}}</h4>
                <p>{{$product->name}}</p>
                <a href="{{ asset('assets/images/products/' .$product->name .'/' .$product->image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" ><i class="bx bx-plus"></i></a>
                <a href="{{ action('App\Http\Controllers\FrontController@detailProduct', $product->slug) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <section id="services" class="services">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Layanan Kami</h2>
        <p>Catur Kreasi Aksara memberikan layanan printing berkualitas tinggi  dengan teknologi mutakhir. Dengan komitmen terhadap standar tertinggi dalam hal desain, presisi, dan kepuasan pelanggan, kami siap membantu Anda mewujudkan visi Anda dengan cara yang mengesankan.</p>
      </div>

      <div class="row">
        <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="icon-box">
            <i class="bi bi-card-checklist"></i>
            <h4><a href="#">Mengapa Memilih Layanan Pencetakan Kami?</a></h4>
            <p>Kami menghadirkan hasil printing yang luar biasa, dan tentunya tanpa melupakan perhatian terhadap detail

            </p>
          </div>
        </div>
        <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
          <div class="icon-box">
            <i class="bi bi-bar-chart"></i>
            <h4><a href="#">Pengalaman dan Reputasi:
            </a></h4>
            <p>Percayakan pada pengalaman kami dalam industri ini. Izinkan kami meningkatkan kebutuhan printing Anda menjadi lebih baik.

            </p>
          </div>
        </div>
        <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="300">
          <div class="icon-box">
            <i class="bi bi-binoculars"></i>
            <h4><a href="#">Jaminan Kepuasan
            </a></h4>
            <p>Anda adalah fokus utama kami, dengan memprioritaskan kualitas pengerjaan untuk menjamin kepuasaan</p>
          </div>
        </div>
        <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="400">
          <div class="icon-box">
            <i class="bi bi-brightness-high"></i>
            <h4><a href="#">Teknologi dan Equipment Terbaik:
            </a></h4>
            <p>Kami menggunakan peralatan terbaik untuk menjamin kualitas printing yang sempurna.</p>
          </div>
        </div>
      </div>

    </div>
  </section>

  <section id="clients" class="clients">
    <div class="container" data-aos="zoom-in">
      <div class="clients-slider swiper">
        <div class="swiper-wrapper align-items-center" style="height: 10% !important">
          @foreach ($clients as $client)
            <div class="swiper-slide"><img src="{{ asset('assets/images/clients/' .$client->name .'/' .$client->image) }}" class="img-fluid" alt=""></div>
          @endforeach
        </div>
        {{-- <div class="swiper-pagination"></div> --}}
      </div>
    </div>
  </section>

  <section id="contact" class="contact" style="margin-top: 10px">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Hubungi Kami</h2>
      </div>

      <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

        <div class="col-lg-6">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Alamat Kantor:</h4>
              <p>Jalan Bintara Jaya Raya
                No.40 Bintara Jaya Bekasi Barat, 17136</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>info@ckaprinting.com</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Telepon:</h4>
              <p>+62 21 8690 1714</p>
            </div>

            <div class="phone">
              <i class="bi bi-whatsapp"></i>
              <h4>Whatsapp:</h4>
              <p>+62 --</p>
            </div>

          </div>

        </div>
        <div class="col-lg-6 mt-4 mt-lg-0" >
          <div class="info" >
            <iframe style="border-radius: 10px; width: 100%; max-width: 680px; height: 320px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.124124584734!2d106.94492587531228!3d-6.247369861172129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698ce4cc0a6917%3A0xe1daf3b66ff07eec!2sPT.%20Catur%20Kreasi%20Aksara!5e0!3m2!1sen!2sid!4v1687587621939!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

        </div>

         <div class="col-lg-12 mt-4 mt-lg-4" data-aos="fade-left" data-aos-delay="100">
  
              <form role="form" class="php-email-form">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="nameContact" placeholder="Your Name" required>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="text" class="form-control" name="number" id="numberContact" placeholder="Your Number" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subjectContact" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea id="messageContact" class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-left"> <button onclick="sendMail(); return false" type="submit">Kirim Pesan</button></div>
              </form>
  
            </div>

      </div>

    </div>
  </section>

  <div id="preloader"></div>
  <a href="https://wa.me/1234567890" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-whatsapp"></i></a>



</main>

@endsection()
