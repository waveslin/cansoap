@extends('layouts.master')

@section('title')
    Shopping Cart  -- Cansoap
@endsection

@section('content')
    <section class="container-fluid bg-light payment-container">
        <div class="container pt-3 pb-3">
            <div class="row">
                <div class="col">
                    <h2 class="font-weight-bold">Payment</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-8 bg-white payment-container">
                    <form action="/payment" method="POST" class="needs-validation" id="payment-form" novalidate>
                    @csrf
                        <div class="col-12 shipping-info mt-4">
                            <div class="form-row">
                                <p class="font-weight-bold payment-title">Shipping Address</p>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="firstname">First name</label>
                                    <input type="text" name="firstname" class="form-control" id="firstname" required/>
                                    <div class="invalid-feedback">
                                        <span>Please provide a valid first name</span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="lastname">Last name</label>
                                    <input type="text" name="lastname" class="form-control" id="lastname" required/>
                                    <div class="invalid-feedback">
                                        <span>Please provide a valid last name</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group md-3 col-12">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" required/>
                                    <div class="invalid-feedback">
                                        <span>Please provide a valid address</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group md-3 col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" name="city" class="form-control" id="city" required/>
                                    <div class="invalid-feedback">
                                        <span>Please provide a valid city</span>
                                    </div>
                                </div>
                                <div class="form-group md-3 col-md-3">
                                    <label for="province">Province</label>
                                    <select name="province" class="form-control" id="province" required/>
                                        <option value="ON">ON</option>
                                        <option value="QC">QC</option>
                                        <option value="NS">NS</option>
                                        <option value="NB">NB</option>
                                        <option value="MB">MB</option>
                                        <option value="BC">BC</option>
                                        <option value="PE">PE</option>
                                        <option value="SK">SK</option>
                                        <option value="AB">AB</option>
                                        <option value="NL">NL</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <span>Please provide a valid province</span>
                                    </div>
                                </div>
                                <div class="form-group md-3 col-md-3">
                                    <label for="postalcode">Postal Code</label>
                                    <input type="text" name="postalcode" class="form-control" id="postalcode" required/>
                                    <div class="invalid-feedback">
                                        <span>Please provide a valid postal code</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 md-3">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" name="phone" class="form-control" id="phone" required/>
                                    <div class="invalid-feedback">
                                        <span>Please provide a valid phone number</span>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 md-3">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="email" required/>
                                    <div class="invalid-feedback">
                                        <span>Please provide a valid email</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12  shipping-info mt-4 mb-3">
                            <div class="row">
                                <div class="col-12 card-info-head d-flex justify-content-between">
                                    <p class="font-weight-bold  payment-title">Card Information</p>
                                    <div>
                                        <img class="card-img" src="img/icon/mastercard.jpg">
                                        <img class="card-img" src="img/icon/visa.jpg">
                                        <img class="card-img" src="img/icon/amex.jpg">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mb-2" id="card-element"></div>
                                <div class="col-12 mb-3" id="card-errors" role="alert"></div>
                            </div> 
                            <div class="row mt-3">
                                <div class="col-12 d-flex justify-content-end">
                                    <button class="btn btn-lg btn-block btn-success" type="submit" id="checkout-button">Pay Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')

<script src="https://js.stripe.com/v3/"></script>
<script src="js/checkout.js"></script>

@endsection