@extends('layouts.frontend')

@section('content')
@include('frontend.partials.nav')


    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">

            
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

@if(Session::has('success'))                     
<div class="alert alert-success alert-dismissible fade show" role="alert">
 <strong>Felicitations</strong> {{ Session::get('success') }} 
 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
 </button>
</div>
@endif
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
                    <div class="checkout_details_area">

                        <div class="cart-page-heading">
                            <h5>Modifier Adresse de Livraison</h5>
                        </div>

                        <form method="post" action="{{ route('update.address') }}">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">Prénom <span>*</span></label>
                                    <input type="text" class="form-control" id="firstname"  name="firstname" value="{{ Auth::user()->firstname }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Nom <span>*</span></label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{ Auth::user()->lastname }}" required>
                                </div>
                    
                                <div class="col-12 mb-3">
                                    <label for="country">Pays <span>*</span></label>
                                    <select class="w-100" id="country" name="country">
                                        <option value="{{ Auth::user()->country }}">{{ Auth::user()->country }}</option>
                                        <option value="Cote d Ivoire">Cote d'Ivoire</option>
                                        <option value="autre">Autre</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Adresse <span>*</span></label>
                                    <input type="text" class="form-control mb-3" id="address" name="address"  value="{{ Auth::user()->address }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="city">Ville <span>*</span></label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ Auth::user()->city }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="city">Commune <span></span></label>
                                    <input type="text" class="form-control" id="city" name="commune" value="{{ Auth::user()->commune }}">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Numéro de téléphone <span>*</span></label>
                                    <input type="text" class="form-control" id="phone_number" name="phone"  value="{{ Auth::user()->phone }}">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address">Email <span>*</span></label>
                                    <input type="email" class="form-control" id="email_address" name="email" value="{{ Auth::user()->email }}">
                                </div>
                            </div>
                            
                            <br>
                            <button type="submit" class="btn essence-btn">mettre a jour</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->


@endsection