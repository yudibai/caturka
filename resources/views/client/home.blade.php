@extends('client.layout.index')

@section('title', 'Home')
@section('content')

<main id="main">
    <section id="hero" class="d-flex justify-cntent-center align-items-center" style="height: auto; max-height: 70vh; margin-top: 80px; transition: 0.8s;">

        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-aos="fade-up">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner" style="height: 100%;">
            @foreach ($sliders as $slider)
              <div class="carousel-item active">
                <img src="{{ asset('assets/images/sliders/' .$slider->title .'/' .$slider->image) }}" class="d-block w-100" alt="...">
              </div>
            @endforeach
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
          </button>
          
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
          </button>
        </div>
      </section>
  <section id="why-us" class="why-us" style="padding-top: 10px">
    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch" data-aos="fade-left">
          <div class="content">
            <h3>Eum ipsam laborum deleniti <strong>velit pariatur architecto aut nihil</strong></h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
            </p>
          </div>

          <div class="accordion-list">
            <ul>
              <li data-aos="fade-up" data-aos-delay="100">
                <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Non consectetur a erat nam at lectus urna duis? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                  <p>
                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="200">
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Feugiat scelerisque varius morbi enim nunc? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="300">
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
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
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-card">Card</li>
            <li data-filter=".filter-web">Web</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container">
        @foreach ($products as $product)
          <div class="col-lg-4 col-md-6 col-6 col-6 portfolio-item filter-app">
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
        <h2>Services</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div>

      <div class="row">
        <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="icon-box">
            <i class="bi bi-card-checklist"></i>
            <h4><a href="#">Lorem Ipsum</a></h4>
            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
        </div>
        <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
          <div class="icon-box">
            <i class="bi bi-bar-chart"></i>
            <h4><a href="#">Dolor Sitema</a></h4>
            <p>Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>
        </div>
        <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="300">
          <div class="icon-box">
            <i class="bi bi-binoculars"></i>
            <h4><a href="#">Sed ut perspiciatis</a></h4>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>
        </div>
        <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="400">
          <div class="icon-box">
            <i class="bi bi-brightness-high"></i>
            <h4><a href="#">Nemo Enim</a></h4>
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
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
          <div class="swiper-slide"><img src="assets/client/img/clients/client-1.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/client/img/clients/client-2.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/client/img/clients/client-3.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/client/img/clients/client-4.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/client/img/clients/client-5.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/client/img/clients/client-6.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/client/img/clients/client-7.png" class="img-fluid" alt=""></div>
          <div class="swiper-slide"><img src="assets/client/img/clients/client-8.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="{{ asset('assets/images/clients/' .$client->name .'/' .$client->image) }}" class="img-fluid" alt=""></div>
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>

  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Contact Us</h2>
      </div>

      <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

        <div class="col-lg-6">
          <div class="info">
            <div class="address">
              <i class="bi bi-geo-alt"></i>
              <h4>Location:</h4>
              <p>A108 Adam Street, New York, NY 535022</p>
            </div>

            <div class="email">
              <i class="bi bi-envelope"></i>
              <h4>Email:</h4>
              <p>info@example.com</p>
            </div>

            <div class="phone">
              <i class="bi bi-phone"></i>
              <h4>Call:</h4>
              <p>+1 5589 55488 55s</p>
            </div>

            <div class="phone">
              <i class="bi bi-whatsapp"></i>
              <h4>Whatsapp:</h4>
              <p>+62 89 55488 55</p>
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
                <div class="text-left"> <button onclick="sendMail(); return false" type="submit">Send Message</button></div>
              </form>
  
            </div>

      </div>

    </div>
  </section>

  <div id="preloader"></div>
  <a href="https://wa.me/1234567890" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-whatsapp"></i></a>



</main>

@endsection()
