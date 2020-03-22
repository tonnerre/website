@extends('layouts.frontend')
@section('content')
@include('frontend.partials.nav')

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb_area bg-img" style="background-image: url({{ URL::to('frontend/img/bg-img/breadcumb.jpg') }});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Articles disponibles</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Shop Grid Area Start ##### -->
    <section class="shop_grid_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3">
 
                    @include('frontend.partials.shop-sidebar')

                </div>

                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        <p><span>{{ \DB::table('products')->count()}}</span> articles trouvés</p>
                                    </div>
                                    <!-- Sorting -->
                                    <div class="product-sorting d-flex">
                                        <p>Trier par:</p>
                                        <form action="#" method="get">
                                            <select name="select" id="sortByselect">
                                                <option value="value">Highest Rated</option>
                                                <option value="value">Newest</option>
                                                <option value="value">Prix: 1000 - 2000</option>
                                                <option value="value">Prix: 2000 - 3000</option>
                                            </select>
                                            <input type="submit" class="d-none" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                <div class="row">

                    @if(!$products->isEmpty())
                    @foreach ($products as $product)
                    <!-- Single Product -->
                    <div class="col-12 col-sm-6 col-lg-4">
                               
                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="{{url('photo/'.$product->product_photo)}}" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="{{url('photo/'.$product->product_photo)}}" alt="">
                            
                            @if($product->product_new == 'yes' && !$product->product_promo == '')
                                       <!-- Product Badge -->
                                        <div class="product-badge new-badge">
                                            <span>Offre</span>
                                        </div>
                                    @elseif($product->product_new == 'yes' && $product->product_promo == '')
                                      <!-- Product Badge -->
                                      <div class="product-badge new-badge">
                                        <span>Nouveau</span>
                                      </div>
                                    @elseif($product->product_new == 'no' && !$product->product_promo == '')
                                        <!-- Product Badge -->
                                        <div class="product-badge offer-badge">
                                            <span>-30%</span>
                                        </div>
                                    @else
                                    @endif
                            
                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>topshop</span>
                            <a href="single-product-details.html">
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
                   
                    </div>

                    @endforeach
                    @else
                    
                    vide

                    @endif

                    </div>
                    </div>

                    {!! $products->links() !!}

                </div>
            </div>
        </div>
    </section>
    <!-- ##### Shop Grid Area End ##### -->

@endsection