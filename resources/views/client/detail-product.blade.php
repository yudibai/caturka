@extends('client.layout.index')
@section('title', 'Equipment')
@section('content')
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <ol>
          <li>Home</li>
          <li>Portfolio Details</li>
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
                  <img src="{{ asset('/assets/images/products/' . $product->slug . '/'. $product->image)}}">
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
                <b> Ukuran product : </b>
                <div class="col-lg-12 " style="margin: auto; padding-top: 10px;">
                  <div class="column text-center" style="margin-bottom: 10px;">
                    <div class="col-lg-12 col-md-8 col-sm-8 border text-center" style="height: 80px;">
                      4x10
                    </div>
                    <div class="col-lg-12 col-md-8 col-sm-8 border"  style="height: 80px;">
                      6x10
                    </div>
                    <div class="col-lg-12 col-md-8 col-sm-8 border"  style="height: 80px;">
                      8x10
                    </div>
                    <div class="col-lg-12 col-md-8 col-sm-8 border"  style="height: 80px;">
                      10x10
                    </div>
                  </div>

                  <p>ingin request ukuran lainnya ke <b>example@gmail.com</b></p>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="background-color: #691a1d; color: white; width: auto; height: 50px; font-size: 12px;border: none;">Open modal for @mdo</button>

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
                              <label for="recipient-name" class="col-form-label">Name:</label>
                              <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                              <label for="message-text" class="col-form-label">Message:</label>
                              <textarea class="form-control" id="message-text"></textarea>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="height: 36px">Close</button>
                          <button type="button" class="btn btn-primary" style="background-color: #691a1d; color: white; border: none;">Send message</button>
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


@endsection