@extends('client.layout.index')

@section('title', 'product')
@section('content')

<section id="portfolio" class="portfoio" style="padding-top: 110px">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>KATALOG</h2>
      <p>
      
Dari Envelope Packaging Golf yang memukau untuk menarik pembeli , Kartu Nama yang mencuri perhatian hingga Brosur yang menginformasikan, Hang Tag yang mencolok hingga Header Card, layanan pencetakan kami mencakup berbagai kebutuhan. Tidak peduli seberapa besar atau kecil kebutuhan Anda, kami adalah solusi yang tepat.
      </p>
    </div>

    <div class="row portfolio-container">
      @foreach ($products as $product)
        <div class="col-lg-4 col-md-6 col-6 col-6 portfolio-item filter-app">
          <img src="{{ asset('assets/images/products/'. $product->image) }}" class="img-fluid" alt="">
          <div class="portfolio-info">
              <h4>{{$product->sub_name}}</h4>
              <p>{{$product->name}}</p>
              <a href="{{ asset('assets/images/products/'. $product->image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" ><i class="bx bx-plus"></i></a>
              <a href="{{ action('App\Http\Controllers\FrontController@detailProduct', $product->slug) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>


  @endsection()