@extends('client.layout.index')

@section('title', 'Contact')
@section('content')

<section id="contact" class="contact" style="padding-top:160px ;">
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
            <div class="text-left"> <button onclick="sendMail" type="submit">Send Message</button></div>
          </form>
        </div>
    </div>
  </section>

@endsection()