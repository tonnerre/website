@extends('layouts.frontend')

@section('content')
@include('frontend.partials.nav')


    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
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
                
                <div class="col-12 col-md-12">

                    
                    <!-- ##### Right Side Cart Area ##### -->

                    <div class="right-side-cart-area">


                    <div class="cart-content d-flex">
                        @if(!$orders->isEmpty())
                        <!-- Cart List Area -->
                        <div class="cart-list">

                            @foreach ($orders as $order)
                            <!-- Single Cart Item -->
                            <div class="single-cart-item">
                                <div href="#" class="product-image">
                                    <img src="{{url('photo/'.$order->product_photo)}}" class="cart-thumb" alt=""   style="width:190px; height:231px;">
                                    <!-- Cart Item Desc -->
                                    <div class="cart-item-desc">
                                        <span class="product-remove"><a href="{{ route('cart.delete', ['id' => $order->id]) }}"><i class="fa fa-close"></i></a>
                                        </span>
                                        <h6>{{ $order->product_name }}</h6>
                                        <p class="size">Quantité: {{ $order->order_quantity }}</p>
                                        <p class="size">Taille: S</p>
                                        <p class="color">Couleur: Rouge</p>
                                        <p class="price">Prix: {{ $order->product_price }} FCFA</p>
                                    </div>
                                </div>
                              </div>
                            @endforeach
                       </div>

                        <!-- Cart Summary -->
                        <div class="cart-amount-summary">

                            <h2>Panier ( {{ $count }} article(s))</h2>
                            <ul class="summary-table">
                                <li><span>sub-total:</span> <span>{{ $price }} FCFA</span></li>
                                <li><span>Reduction:</span> <span>0%</span></li>
                                <li><span>total:</span><span><h4>{{ $price }} FCFA</h4></span></li>
                            </ul>

                            <div class="checkout-btn mt-100">
                                <a href="{{url('/delivery')}}" class="btn essence-btn">Finalizer votre commande</a>
                            </div>
                            
                        </div>      

                        @else
                 
                            

                                 
                        <div class="cart-amount-summary">

                            <h2>Votre panier est vide</h2>

                            <img src="{{ URL::to('frontend/img/core-img/empty.png') }}" height="150" width="150">
                    
                            <div class="checkout-btn mt-100">
                                <a href="/" class="btn essence-btn">Acheter maintenant</a>
                            </div>
                        </div>
                        @endif
                    </div>
                    </div>
                    <!-- ##### Right Side Cart End ##### -->
                        
    
                        
                </div>

            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->


@endsection