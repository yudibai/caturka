@extends('client.layout.index')

@section('title', 'product')
@section('content')

<section id="portfolio" class="portfoio" style="padding-top: 110px">
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


  @endsection()