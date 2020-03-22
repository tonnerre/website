@extends('layouts.frontend')

@section('content')
@include('frontend.partials.nav')

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-20">
        <div class="container">


            @if(auth()->user()->is_admin == 1) 
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Vous etes un administrateur!</strong> <a href="{{url('admin/dashboard')}}">Cliquez pour accedez a l'espace administrateur </a>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              @else
              @endif
                    <a class="btn essence-btn" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Me deconnecter') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                 </form>

                    <br>
                    <br>
               

            <div class="row">
              
                <div class="col-12 col-md-4">

                    <form action="#" method="post">

                    <div class="checkout_details_area">

                        <div class="cart-page-heading">
                            <h5>Mon Compte </h5>
                        </div>

                            <hr>

                            <div class="address-info">
                                <h6>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h6>
                                <p> {{ Auth::user()->address }} {{ Auth::user()->commune }} {{ Auth::user()->city }}</p>
                            </div>

                    </div>
                    
                </form>
                </div>

                <div class="col-12 col-md-8">

                    <form action="#" method="post">

                    
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
                            <h5>Votre Panier ( {{ $count1 }} article(s) en attente) <a href="{{url('/address')}}" class="pull-right">poursuivre mes achats</a></h5>
                        </div>

                    </div>

                    <div class="checkout_details_area">

                        <div class="cart-page-heading">
                            <h5>Vos commandes ( {{ $count2 }} commande(s) ) <a href="{{url('/address')}}" class="pull-right">poursuivre mes achats</a></h5>
                        </div>

                    </div>

                    
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->


@endsection