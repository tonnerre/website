@extends('layouts.frontend')

@section('content')
@include('frontend.partials.nav')
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">tous les articles</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
             

                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Filtrer Par Prix</h3>
                    <div id="price-slider"></div>
                </div>
                <!-- aside widget -->

                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Filtrer Par Couleur:</h3>
                    <ul class="color-option">
                        <li><a href="#" style="background-color:#475984;"></a></li>
                        <li><a href="#" style="background-color:#8A2454;"></a></li>
                        <li class="active"><a href="#" style="background-color:#BF6989;"></a></li>
                        <li><a href="#" style="background-color:#9A54D8;"></a></li>
                        <li><a href="#" style="background-color:#675F52;"></a></li>
                        <li><a href="#" style="background-color:#050505;"></a></li>
                        <li><a href="#" style="background-color:#D5B47B;"></a></li>
                    </ul>
                </div>
                <!-- /aside widget -->

                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Filtrer Par Taille:</h3>
                    <ul class="size-option">
                        <li class="active"><a href="#">S</a></li>
                        <li class="active"><a href="#">XL</a></li>
                        <li><a href="#">SL</a></li>
                    </ul>
                </div>
                <!-- /aside widget -->

                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Filtrer Par Marque</h3>
                    <ul class="list-links">
                        <li><a href="#">Nike</a></li>
                        <li><a href="#">Adidas</a></li>
                        <li><a href="#">Polo</a></li>
                        <li><a href="#">Lacost</a></li>
                    </ul>
                </div>
                <!-- /aside widget -->

                <!-- aside widget -->
                <div class="aside">
                    <h3 class="aside-title">Filtrer Par Genre</h3>
                    <ul class="list-links">
                        <li class="active"><a href="#">Homme</a></li>
                        <li><a href="#">Femme</a></li>
                    </ul>
                </div>
                <!-- /aside widget -->
            </div>
            <!-- /ASIDE -->

            <!-- MAIN -->
            <div id="main" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="pull-left">
                        <div class="row-filter">
                            <a href="#"><i class="fa fa-th-large"></i></a>
                            <a href="#" class="active"><i class="fa fa-bars"></i></a>
                        </div>
                        <div class="sort-filter">
                            <span class="text-uppercase">Filtrer Par:</span>
                            <select class="input">
                                    <option value="0">Position</option>
                                    <option value="0">Prix</option>
                                    <option value="0">Rating</option>
                                </select>
                            <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="page-filter">
                            <span class="text-uppercase">Montrer:</span>
                            <select class="input">
                                    <option value="0">10</option>
                                    <option value="1">20</option>
                                    <option value="2">30</option>
                                </select>
                        </div>
                        <ul class="store-pages">
                            <li><span class="text-uppercase">Page:</span></li>
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /store top filter -->

                <!-- STORE -->
                <div id="store">
                    <!-- row -->
                    <div class="row">
                        
                        @if(!$products->isEmpty())
				@foreach ($products as $product)
				<!-- Product Single -->
				<div class="col-md-4 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<div class="product-label">
								@if($product->product_new == 'yes' && !$product->product_promo == '')
								<span>Nouveau</span>
								<span class="sale">-20%</span>
								@elseif($product->product_new == 'yes' && $product->product_promo == '')
								<span>Nouveau</span>
								@elseif($product->product_new == 'no' && !$product->product_promo == '')
								<span class="sale">-20%</span>
								@else
								@endif
							</div>
							
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							<img src="{{url('photo/'.$product->product_photo)}}" alt="{{ $product->product_name }}">
						</div>
						<div class="product-body">
							<h3 class="product-price">{{ $product->product_price }} FCFA<del class="product-old-price">{{ $product->original_price }} FCFA</del></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="#">{{ $product->product_name }}</a></h2>
							<form method="post" action="{{ route('add.cartitem') }}" enctype="multipart/form-data">
								{{csrf_field()}}
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<input type="hidden" value="{{$product->product_photo}}" name="cproduct_photo">
								<input type="hidden" value="{{$product->id}}" name="product_id">
								<input type="hidden" value="{{$product->product_name}}" name="cproduct_name">
								<input type="hidden" value="{{$product->product_price}}" name="cproduct_price">
								<input type="hidden" value="1" name="cproduct_quantity">
								<input type="hidden" value="1" name="cproduct_available">
								<input type="hidden" value="0" name="cart_status">
								<input type="hidden" value="{{$product->product_price}}" name="cproduct_total">
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> J'ACHETE</button>
							</div>
						</form>
						</div>
					</div>
				</div>
				<!-- /Product Single -->
				@endforeach
				@else
				
				vide

				@endif

                    </div>
                    <!-- /row -->
                </div>
                <!-- /STORE -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <div class="pull-left">
                        <div class="row-filter">
                            <a href="#"><i class="fa fa-th-large"></i></a>
                            <a href="#" class="active"><i class="fa fa-bars"></i></a>
                        </div>
                        <div class="sort-filter">
                            <span class="text-uppercase">Filtrer par:</span>
                            <select class="input">
                                    <option value="0">Position</option>
                                    <option value="0">Prix</option>
                                    <option value="0">Note</option>
                                </select>
                            <a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
                        </div>
                    </div>
                    <div class="pull-right">
                        <div class="page-filter">
                            <span class="text-uppercase">Montrer:</span>
                            <select class="input">
                                    <option value="0">10</option>
                                    <option value="1">20</option>
                                    <option value="2">30</option>
                                </select>
                        </div>
                        <ul class="store-pages">
                            <li><span class="text-uppercase">Page:</span></li>
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /MAIN -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->



@endsection