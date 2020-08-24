@extends('layouts.master')

@section('title')
    Product  -- Wavesoap
@endsection

@section('content')
    <section class="container-fluid product-container">
        <div class="container info-container">
            <div class="row">
                <div class="col-sm-12 col-md-6 text-center">
                    <img src="{{ asset('img/products/'.$product->image) }}" alt="" class="product-img rounded mx-auto d-block">
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <h4>{{ $product->name }}</h4>
                        </div>
                        <div class="col-12">
                            <h5>${{ $product->price }}</h5>
                        </div>
                        <form method="POST" action="{{route('soap.add', ['product_name' => $product->name])}}">
                        @csrf
                        <div class="col-12 m-3">
                            <div class="qty">
                                <span class="minus bg-dark" data-minus="{{ str_replace(' ','_',$product->name) }}">-</span>
                                <input type="number" name="{{ $product->name }}" value="1" id="{{str_replace(' ','_',$product->name)}}">
                                <span class="plus bg-dark" data-plus="{{ str_replace(' ','_',$product->name) }}">+</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-lg m-1 add-cart">Add to Cart</button>
                        </div>
                       </form>
                        <div class="col-12">
                            <p>
                            {{ $product->description }}
                            </p>
                        </div>
                        <div class="col-12">
                            <p>
                            Ingredients: {{ $product->ingredients }}
                            </p>
                        </div>
                        <div class="col-12">
                            <p>
                                soap is approx. {{ $product->weight }}g
                            </p>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </section>
@endsection

@section('script')
<script type="text/javascript">

$( document ).ready(function() {
    $(document).on('click','.plus',function(e){
        $('#'+e.target.dataset.plus).val(parseInt($('#'+e.target.dataset.plus).val()) + 1 );
    });
    $(document).on('click','.minus',function(e){
        $('#'+e.target.dataset.minus).val(parseInt($('#'+e.target.dataset.minus).val()) - 1 );
        if($('#'+e.target.dataset.minus).val() <= 1)
        {
            $('#'+e.target.dataset.minus).val(1);
        }
    });
});
</script>
@endsection