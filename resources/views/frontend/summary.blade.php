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
                
                <div class="col-12 col-md-6">

                    <form method="post" action="{{ route('place.order') }}">
                        {{csrf_field()}}

                    <div class="checkout_details_area">

                        <div class="cart-page-heading">
                            <h5>Adresse de Livraison </h5>
                        </div>

                            <hr>

                            <div class="address-info">
                                <h6>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h6>
                                <p> {{ Auth::user()->address }} {{ Auth::user()->commune }} {{ Auth::user()->city }}</p>
                            </div>

                        <br>

                    </div>

                    <div class="checkout_details_area">
                            <div class="address-info">
                                <h6>Sub-Total: {{ $price }} FCFA</h6>
                                <h6>Frais de livraison: {{ $price }} FCFA</h6>
                                <h6>Sub-Total: {{ $price + 1500 }} FCFA</h6>
                            </div>
                    </div>


                    <br>
                    <button type="submit" class="btn essence-btn">Placer votre commande</button>
               
                </form>
                </div>

                <div class="col-12 col-md-6">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Resume de la Commande ( {{ $count }} articles)</h5>
                        </div>

                        @if(!$orders->isEmpty())
                        <ul class="order-details-form mb-4">
                            <li><span>Article</span> <span>Total</span></li>
                            
                            @foreach ($orders as $order)
                            <li><span>{{ $order->product_name }}</span> <span>{{ $order->product_price }} FCFA</span></li>
                            @endforeach

                       </ul>
                        @else
                            Vous
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->


@endsection