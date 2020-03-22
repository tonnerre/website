@extends('layouts.frontend')
@section('content')
@include('frontend.partials.nav')


<section class="welcome_area bg-img background-overlay" style="background-image: url({{ URL::to('frontend/img/bg-img/bg-1.jpg') }});">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="hero-content">
                    <h6>Bienvenu sur</h6>
                    <h2>Tonnerre.com</h2>
                    <a href="#" class="btn essence-btn">Voir nos Articles</a>
                </div>
            </div>
        </div>
    </div>
</section>

    <section class="section-padding-20 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-area">
                      <img src="{{ URL::to('frontend/img/core-img/truck.png') }}" >
                      <h2>Livraison Rapide</h2>
                    </div>
                </div>

                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-area">
                        <img src="{{ URL::to('frontend/img/core-img/pay.png') }}" >
                        <h2>Payer Cash</h2>
                      </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-area">
                        <img src="{{ URL::to('frontend/img/core-img/return.png') }}" >
                        <h2>Politique de retour</h2>
                      </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-area">
                      <img src="{{ URL::to('frontend/img/core-img/phone.png') }}" >
                      <h2>Nous Contacter</h2>
                    </div>
                    </div>
            </div>
        </div>
    </div>



    
    <!-- ##### Top Catagory Area Start ##### -->
    <div class="top_catagory_area section-padding-20 clearfix">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{ URL::to('frontend/img/bg-img/bg-2.jpg') }});">
                        <div class="catagory-content">
                            <a href="#">Vetements</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{ URL::to('frontend/img/bg-img/bg-3.jpg') }});">
                        <div class="catagory-content">
                            <a href="#">Chaussures</a>
                        </div>
                    </div>
                </div>
                <!-- Single Catagory -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url({{ URL::to('frontend/img/bg-img/bg-4.jpg') }});">
                        <div class="catagory-content">
                            <a href="#">Accessoires</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Top Catagory Area End ##### -->

    <br>

    <!-- ##### New Arrivals Area Start ##### -->
    <section class="new_arrivals_area clearfix">
        <div class="container">

            <div class="row">
                <div class="col-12">
                        <div class="section-heading">
                            <h2>Nouvels Arrivages</h2>

                            <hr>
                        </div>
                </div>
            </div>
        </div>

        <div class="container">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong></strong>{{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">

                        @if(!$products->isEmpty())
							@foreach ($products as $product)
                        <!-- Single Product -->
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="{{url('photo/'.$product->product_photo)}}" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="{{url('photo/'.$product->product_photo)}}" alt="">
                                
                                <!-- Favourite -->
                                <div class="product-favourite">
                                    <a href="#" class="favme fa fa-heart"></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <span>{{ $product->brand_name }}</span>
                                <a href="{{ route('product', ['id' => $product->id]) }}">
                                    <h6>{{ $product->product_name }}</h6>
                                </a>
                                <p class="product-price"><span class="old-price">{{ $product->original_price }} FCFA</span> {{ $product->product_price }} FCFA</p>

                                <!-- Hover Content -->
                                <div class="hover-content">
                                    <!-- Add to Cart -->
                                    <div class="add-to-cart-btn">

                                        <form method="post" action="{{ route('add.cartitem') }}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                        <div class="product-btns">
                                           <input type="hidden" value="{{$product->id}}" name="product_id">
                                           <input type="hidden" value="{{$product->product_price}}" name="order_price">
                                           <button class="btn essence-btn">Ajouter au panier</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
							@else
							
							vide

                            @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### New Arrivals Area End ##### -->
    
    
        <!-- ##### Popular Products Area Start ##### -->
    <section class="new_arrivals_area clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h2>Articles Populaires</h2>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popular-products-slides owl-carousel">
                        @if(!$products->isEmpty())
                        @foreach ($products as $product)
                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="{{url('photo/'.$product->product_photo)}}" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="{{url('photo/'.$product->product_photo)}}" alt="">
                            
                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>{{ $product->brand_name }}</span>
                            <a href="{{ route('product', ['id' => $product->id]) }}">
                                <h6>{{ $product->product_name }}</h6>
                            </a>
                            <p class="product-price"><span class="old-price">{{ $product->original_price }} FCFA</span> {{ $product->product_price }} FCFA</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">

                                    <form method="post" action="{{ route('add.cartitem') }}" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                    <div class="product-btns">
                                       <input type="hidden" value="{{$product->id}}" name="product_id">
                                       <input type="hidden" value="{{$product->product_price}}" name="order_price">
                                       <button class="btn essence-btn">Ajouter au panier</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                        @else
                        
                        vide

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Popular Products Area End ##### -->


        <!-- ##### CTA Area Start ##### -->
        <div class="cta-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="cta-content bg-img background-overlay" style="background-image: url({{ URL::to('frontend/img/bg-img/bg-5.jpg') }});">
                            <div class="h-100 d-flex align-items-center justify-content-end">
                                <div class="cta--text">
                                    <h6>Jusqu'à 60% de reduction</h6>
                                    <h2>Sur nos articles</h2>
                                    <a href="#" class="btn essence-btn">Acheter maintenant</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### CTA Area End ##### -->


    <!-- ##### Brands Area Start ##### -->
    <div class="brands-area d-flex align-items-center justify-content-between">
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ URL::to('frontend/img/core-img/brand1.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ URL::to('frontend/img/core-img/brand2.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ URL::to('frontend/img/core-img/brand3.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ URL::to('frontend/img/core-img/brand4.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ URL::to('frontend/img/core-img/brand5.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ URL::to('frontend/img/core-img/brand6.png') }}" alt="">
        </div>
    </div>
    <!-- ##### Brands Area End ##### -->
@endsection