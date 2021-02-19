@extends('layouts.master')

@section('title')
    Cansoap Shop
@endsection

@section('content')
<section class="container home">
    <div class="row">
        <div id="slider" class="carousel slide home-slider" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#slider" data-slide-to="0" class="active"></li>
            <li data-target="#slider" data-slide-to="1"></li>
            <li data-target="#slider" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner home-slider">
            <div class="carousel-item banner-img active">
              <img class="d-block w-100 banner-img" src="/img/banners/banner1.jpg" alt="First slide">
              <div class="carousel-caption d-none d-md-block">
                <h2>Welcome to Cansoap</h2>
                <p>100% handmade soap</p>
              </div>
            </div>
            <div class="carousel-item banner-img home-slider">
              <img class="d-block w-100 banner-img" src="/img/banners/banner2.jpg" alt="Second slide">
              <div class="carousel-caption d-none d-md-block">
                <h2>Cansoap</h2>
                <h5>100% good smell</h5>
              </div>
            </div>
            <div class="carousel-item banner-img home-slider">
              <img class="d-block w-100 banner-img" src="/img/banners/banner3.jpg" alt="Third slide">
              <div class="carousel-caption d-none d-md-block">
                <h1>Best soap you can found in the world</h1>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#slider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#slider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
  </section>

  <section class="container home">
  <div class="row">
  @foreach ($products as $product)
    <div class="col-sm-12 col-md-6 col-lg-3 item">
      <div class="container item-content">
        <a class="link item-link" href="/product/{{$product->name}}">
          <div class="item-img-container d-flex justify-content-center align-items-center">
              <img class="container item-img" src="img/products/{{$product->image}}">
          </div>
          <div class="container item-body-container">
              <h4 class="item-name">{{$product->name}}</h4>
              <h6 class="item-price">${{$product->price}}</h6>
          </div>
        </a>
      </div>
    </div>
  @endforeach   
  </div>
  </section>
@endsection

@section('script')

@endsection