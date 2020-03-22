
    @extends('layouts.frontend')
    @section('content')
    @include('frontend.partials.nav')
    
    <!-- ##### Single Product Details Area Start ##### -->
    <section class="single_product_details_area d-flex align-items-center">

        <!-- Single Product Thumb -->
        <div class="single_product_thumb clearfix">
            <div class="product_thumbnail_slides owl-carousel">
                <img src="{{url('photo/'.$product->product_photo)}}" alt="" style="width:675px; height:656px;">
                <img src="{{url('photo/'.$product->product_photo)}}" alt="" style="width:675px; height:656px;">
                <img src="{{url('photo/'.$product->product_photo)}}" alt="" style="width:675px; height:656px;">
            </div>
        </div>

        <!-- Single Product Description -->
        <div class="single_product_desc clearfix">
            <span>mango</span>
            <a href="cart.html">
                <h2>{{ $product->product_name }}</h2>
            </a>
            <p class="product-price"><span class="old-price"> {{ $product->original_price }} FCFA</span> {{ $product->product_price }} FCFA</p>
            <p class="product-desc">{{ $product->product_description }}</p>

            <!-- Form -->
            <form class="cart-form clearfix" method="post">
                <!-- Select Box -->
                <div class="select-box d-flex mt-50 mb-30">
                    <select name="select" id="productSize" class="mr-5">
                        <option value="value">Taille: XL</option>
                        <option value="value">Taille: X</option>
                        <option value="value">Taille: M</option>
                        <option value="value">Taille: S</option>
                    </select>
                    <select name="select" id="productColor">
                        <option value="value">Couleur: Black</option>
                        <option value="value">Couleur: White</option>
                        <option value="value">Couleur: Red</option>
                        <option value="value">Couleur: Purple</option>
                    </select>
                </div>
                <!-- Cart & Favourite Box -->
                <div class="cart-fav-box d-flex align-items-center">
                    <!-- Cart -->

                    <form method="post" action="{{ route('add.product') }}" enctype="multipart/form-data">
                        {{csrf_field()}}
                    <div class="product-btns">
                       <input type="hidden" value="{{$product->product_photo}}" name="cproduct_photo">
                        <input type="hidden" value="{{$product->id}}" name="product_id">
                        <input type="hidden" value="{{$product->product_name}}" name="cproduct_name">
                        <input type="hidden" value="{{$product->product_price}}" name="cproduct_price">
                        <input type="hidden" value="1" name="cproduct_quantity">
                        <input type="hidden" value="1" name="cproduct_available">
                        <input type="hidden" value="0" name="item_status">
                        <input type="hidden" value="{{$product->product_price}}" name="cproduct_total">
                        <button class="btn essence-btn">Ajouter au panier</button>
                    </div>
                </form>
                        
                   <!-- Favourite -->
                    <div class="product-favourite ml-4">
                        <a href="#" class="favme fa fa-heart"></a>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- ##### Single Product Details Area End ##### -->
    
@endsection