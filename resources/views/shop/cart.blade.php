@extends('layouts.master')

@section('title')
    Shopping Cart  -- Wavesoap
@endsection

@section('content')
    <section class="container-fluid cart-container">
        <div class="container info-container">
            @if($cartlist)
            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-12 m-1">
                            <h2>Your Cart</h2>
                        </div>
                        @foreach($cartlist->items as $item)
                        <div class="col-12 m-1 p-2">
                            <div class="cart-item row">
                               <div class="col-sm-12 col-md-4 cart-item-img-container">
                                    <img src="/img/products/{{$item['image']}}" class="cart-item-image" alt="">
                               </div>
                               <div class="col-sm-12 col-md-8 d-flex flex-column justify-content-around">
                                   <div class="row m-1">
                                        <div class="col-12 d-flex justify-content-between cart-item-info">
                                            <span class="font-weight-bold need-sm-gap"><a class="text-dark" href="/product/{{$item['name']}}">{{$item['name']}}</a></span>
                                            <span class="font-weight-bold need-sm-gap">${{$item['price']}}</span>
                                        </div>
                                    </div>
                                    <div class="row m-1">
                                        <div class="col-12 qty need-sm-gap">
                                            <form method="POST" action="/cart">
                                                <span class="minus bg-dark" data-minus="{{ str_replace(' ','_',$item['name']) }}">-</span>
                                                <input type="number" class="num" name="{{ $item['name'] }}" value="{{ $item['quantity']}}" id="{{str_replace(' ','_',$item['name'])}}">
                                                <span class="plus bg-dark" data-plus="{{ str_replace(' ','_',$item['name']) }}">+</span>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="row m-1">
                                        <div class="col-12 need-sm-gap">
                                            <i class="fas fa-trash-alt"></i>
                                            <span>
                                                <a class="text-muted" href="remove/{{$item['name']}}">Remove</a>
                                            </span>
                                        </div>
                                   </div>
                               </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 info-container">
                    <div class="row order-summary">
                        <div class="col-12 m-1">
                            <h4>Order Summary</h4>
                        </div>
                        <div class="col-12 m-1 d-flex justify-content-between">
                            <span>Products Subtotal</span>
                            <span id="productSubtotal">${{$summary['subtotal']}}</span>
                        </div>
                        <div class="col-12 m-1 d-flex justify-content-between">
                            <span>Estimated Shipping</span>
                            <span id="shipping">${{$summary['shipping']}}</span>
                        </div>
                        <div class="col-12 m-1 d-flex justify-content-between">
                            <span>Estimated Taxes</span>
                            <span id="taxes">${{$summary['taxes']}}</span>
                        </div>
                        <div class="col-12 m-1 pt-3  d-flex justify-content-between border-top">
                            <span class="font-weight-bold">Estimated Total</span>
                            <span class="font-weight-bold" id="total">${{$summary['total']}}</span>
                        </div>
                        <div class="col-12 m-2 d-flex flex-column justify-content-around">
                            <a class="btn btn-primary btn-lg btn-block checkout-btn" href="/payment">Check Out</a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="empty-cart">
                    <h1>Cart is Empty</h1>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection

@section('script')
<script type="text/javascript">

$( document ).ready(function() {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click','.plus',function(e){
        $('#'+e.target.dataset.plus).val(parseInt($('#'+e.target.dataset.plus).val()) + 1 );
        $.ajax({
            url: "/cart",
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {_token: CSRF_TOKEN, 
                    name : e.target.dataset.plus, 
                    quantity: $('#'+e.target.dataset.plus).val()
                    },
            encode: true,
            success:function(data){
                $('#'+e.target.dataset.plus).val(data.quantity);
                $('#productSubtotal').replaceWith('<span id="productSubtotal">'+data.summary.subtotal+'</span>');
                $('#taxes').replaceWith('<span id="taxes">'+data.summary.taxes+'</span>');
                $('#shipping').replaceWith('<span id="shipping">'+data.summary.shipping+'</span>');
                $('#total').replaceWith('<span class="font-weight-bold" id="total">'+data.summary.total+'</span>');
                $('#cartnum').replaceWith('<span class="badge badge-warning" id="cartnum">'+data.cartNum+'</span>');
            }
        }).fail(function(jqXHR, textStatus, error){
            // console.log(jqXHR.responseText);
            console.log(textStatus);
            console.log(error)
        });
    });

    $(document).on('click','.minus',function(e){
        $('#'+e.target.dataset.minus).val(parseInt($('#'+e.target.dataset.minus).val()) - 1 );
        if($('#'+e.target.dataset.minus).val() < 1)
        {
            $('#'+e.target.dataset.minus).val(1);
        }else{
            $.ajax({
            url: "/cart",
            type: 'POST',
            /* send the csrf-token and the input to the controller */
            data: {_token: CSRF_TOKEN, 
                    name : e.target.dataset.minus, 
                    quantity: $('#'+e.target.dataset.minus).val()
                    },
            encode: true,
            success:function(data){
                $('#'+e.target.dataset.plus).val(data.quantity);
                $('#productSubtotal').replaceWith('<span id="productSubtotal">'+data.summary.subtotal+'</span>');
                $('#taxes').replaceWith('<span id="taxes">'+data.summary.taxes+'</span>');
                $('#shipping').replaceWith('<span id="shipping">'+data.summary.shipping+'</span>');
                $('#total').replaceWith('<span class="font-weight-bold" id="total">'+data.summary.total+'</span>');
                $('#cartnum').replaceWith('<span class="badge badge-warning" id="cartnum">'+data.cartNum+'</span>');
                }
            }).fail(function(jqXHR, textStatus, error){
            // console.log(jqXHR.responseText);
            console.log(textStatus);
            console.log(error)
            });
        }
    });

});
</script>
@endsection