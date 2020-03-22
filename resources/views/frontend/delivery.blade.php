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

            <form method="post" action="{{ route('delivery.fee') }}">
                {{csrf_field()}}

            <div class="row">
                
                <div class="col-12 col-md-6">

                    

                    <div class="checkout_details_area">

                        <div class="cart-page-heading">
                            <h5>Adresse de Livraison <a href="{{url('/address')}}" class="pull-right">Modifier l'adresse</a></h5>
                        </div>

                            <hr>

                            <div class="address-info">
                                <h6>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h6>
                                <p> {{ Auth::user()->address }} {{ Auth::user()->commune }} {{ Auth::user()->city }}</p>
                            </div>

                    </div>

                    <div class="checkout_details_area">

                        <div class="cart-page-heading">
                            <h5>Mode de livraison</h5>
                        </div>

                         
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="delivery_fee"  value="1500" checked>
                                <label class="form-check-label">
                                    <h6>Livraison a Domicile</h6>
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="delivery_fee"  value="0">
                                <label class="form-check-label">
                                    <h6>Passer en Agence</h6>
                                </label>
                              </div>  

                    </div>

                    <br>
                    <button type="submit" class="btn essence-btn">Continuez</button>
               
                
                </div>

                <div class="col-12 col-md-6">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Votre Commande ( {{ $count}} articles)</h5>
                            <p>Les Details</p>
                        </div>

                        @if(!$orders->isEmpty())
                        <ul class="order-details-form mb-4">
                            <li><span>Article</span> <span>Total</span></li>
                            
                            @foreach ($orders as $order)
                             
                           <li><span>{{ $order->product_name }}</span> <span>{{ $order->product_price }} FCFA</span></li>
                            @endforeach

                            <li><span>Sub-total</span> <span>{{ $price }} FCFA</span></li>
                            <li><span>Frais de Livraison</span> <span>{{ $order->delivery_fee }}</span></li>
                            <li><span>Total</span> <span>{{ $price }} FCFA</span></li>
                        </ul>
                        @else
                            Vous
                        @endif
                    </div>
                </div>
            </div>

        </form>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->


@endsection