@extends('layouts.master')

@section('title')
    Collection  -- Wavesoap
@endsection

@section('content')
    <section class="container-fluid">
        <div class="container">
            <div class="row">
            @foreach ($products as $product)
                <div class="col-sm-12 col-md-6 col-lg-3 item">
                    <div class="container item-content">
                        <a class="link item-link" href="/product/{{$product->name}}">
                            <div class="item-img-container  d-flex justify-content-center align-items-center">
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
            <div class="row">
            <div class="col-12 d-flex justify-content-center">
            {{ $products->links() }}
            </div>
            </div>
        </div>
    </section>
@endsection