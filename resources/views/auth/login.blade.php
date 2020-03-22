@extends('layouts.frontend')

@section('content')
@include('frontend.partials.nav')


<div class="single-blog-wrapper section-padding-80">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5" style="border: 2px solid #ebebeb; padding-top: 10px; padding-bottom: 10px;">
                        <h3>Me connecter</h3>
                        <br>
                        <form class="row login_form"  method="post" id="contactForm" novalidate="novalidate" action="{{ route('login') }}">
                            @csrf
                        <div class="row"> 
                            
                            <div class="col-12 mb-4">
                                <label for="email_address">Email <span>*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                            </div>
                            
                            <div class="col-12 mb-4">
                                <label for="password">Mot de passe <span>*</span></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de Passe" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mot de passe'">
                            </div>
                            
                        </div>
                            
                        <br>
                            
                        <button type="submit" class="btn essence-btn">Se connecter</button>
                        
                    </form>
            </div>
        </div>
    </div>
</div>


@endsection