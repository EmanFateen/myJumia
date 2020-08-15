@extends('layouts.master')
@extends('includes.navbar',['categories'=>$categories])

@section('content')

<div class="container ">
    <div class="cartDiv">
        <div class="row">
            <div class="col-12">
                <p class="cart_title">Cart ( <span class="cart_item_number"></span> items)</p>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <p>ITEM</p>
            </div>
            <div class="col-2">
                <p>QUANTITY</p>
            </div>
            <div class="col-2">
                <p>UNIT PRICE</p>
            </div>
            <div class="col-2">
                <p>SUBTOTAL</p>
            </div>
        </div>

        <div id="Cart-total">
            <div class="Cart-Items" id="Cart-Items">
                <div class="row">
                    <div class="col-6">
                        <div class="cart_section">
                            <div class="row">
                                <div class="col-4">
                                    <img src="https://eg.jumia.is/-2sMwiPw5X_eEGpf5F-e3ZYSj3c=/fit-in/60x60/filters:fill(white)/product/75/0637/1.jpg?1409" alt="">
                                </div>
                                <div class="col-8">
                                    <p>Al Doha Grocery Consignment Marketplace</p>
                                    <p>Bulgur - 500 G</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="cart_section">
                            <p>1</p>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="cart_section">
                            <p>EGP 11</p>
                            <p>EGP 12</p>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="">
                            <p>EGP 11</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="totalprice">
                    Total: EGP <span class="finalprice">1000<span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="cart_btns">
                    <a type="button" class="btn continue_shopping_BTN"   href="{{route('main')}}">Continue Shopping</a>
                    <a type="button" class="btn view_cart_BTN"  href="{{route('checkout')}}">Continue to checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection