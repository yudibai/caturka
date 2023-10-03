@extends('client.layout.index')

@section('title', 'product')
@section('content')

<section id="portfolio" class="portfoio" style="padding-top: 110px">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>KATALOG</h2>
      <p>Selamat datang di katalog produk digital printing kami, tempat di mana inspirasi dan kreativitas terhubung dengan teknologi modern untuk menghasilkan solusi cetak berkualitas tinggi. Dengan perpaduan antara inovasi dan desain yang menarik, produk digital printing kami akan membantu Anda mewujudkan visi Anda dengan cara yang tak terlupakan. Berikut adalah rangkaian produk digital printing berkualitas tinggi yang kami tawarkan:.</p>
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


  @endsection()