@extends('layouts.page')

@section('title')
    Success paid -- Cansoap
@endsection

@section('content')
    <section class="container-fluid">
        <div class="container info-container pt-3 pb-5">
            <div class="row">
                <div class="col">
                <div class="alert alert-success text-center" role="alert">
                    <span class="font-weight-bold">Thank you</span>
                    <span>for purchasing our products ! please download your receipt (PDF file) </span>
                    <span class="font-weight-bold">
                    <a href="/pdf/receipt.pdf">HERE</a>
                    </span>
                    <span>.</span>
                </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col">
                <h2 class="text-center">
                    <a href="{{route('soap.index')}}">
                        Continue Shopping
                    </a>
                </h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h6>Contact us</h6>
                </div>
                <div class="col-12">
                    <p class="info-text">
                        <span class="font-weight-bold"> Phone </span>: 1-513-222-2222 </br>
                        <span class="font-weight-bold"> Fax </span>: (413) 222-2222 </br>
                    </p>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    <h5 class="text-center"><span class="font-weight-bold"> Order ID: </span> {{$order->oid}}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="info-text">
                        <span class="font-weight-bold"> Customer Mail Address: </span></br>
                        {{$order->address}}, </br>
                        {{$order->city}}, {{$order->province}}  </br>
                        Canada , {{$order->postal}} <br>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 container d-flex justify-content-center">
                    <table class="table table-striped table-responsive-sm ">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col" class="text-center">Product</th>
                            <th scope="col" class="text-center">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td class="text-center">{{explode(":=", $item)[0]}}</td>
                                <td class="text-center"> {{substr($item, strpos($item, ":=") + 2)}} </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-center">Taxes</th>
                                <th scope="col" class="text-center">{{$order->taxes}}</th>
                            </tr>
                            <tr>
                                <th scope="col" class="text-center">Shipping Fee</th>
                                <th scope="col" class="text-center">{{$order->shipping_fee}}</th>
                            </tr>
                            <tr>
                                <th scope="col" class="text-center">Total Cost</th>
                                <th scope="col" class="text-center">{{$order->total}}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection