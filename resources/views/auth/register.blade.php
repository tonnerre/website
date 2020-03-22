@extends('layouts.frontend')

@section('content')
@include('frontend.partials.nav')
<div class="single-blog-wrapper section-padding-80">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5" style="border: 2px solid #ebebeb; padding-top: 10px; padding-bottom: 10px;">
                        <h3>Créer un compte</h3>
                        <br>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="first_name">Prénom <span>*</span></label>
                                <input type="text" class="form-control" id="firstname" name="lastname" value="{{ old('lastname') }}" autocomplete="lastname" autofocus>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="last_name">Nom <span>*</span></label>
                                <input type="text" class="form-control" id="lastname" name="firstname" value="{{ old('firstname') }}" autocomplete="firstname" autofocus>
                            </div>
                            
                            <div class="col-12 mb-4">
                                <label for="email_address">Email <span>*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" autocomplete="email">
                            </div>
                            
                            <div class="col-12 mb-4">
                                <label for="password">Mot de passe <span>*</span></label>
                                <input type="password" class="form-control" id="password" name="password" autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            
                             <div class="col-12 mb-4">
                                <label for="password">Mot de passe <span>*</span></label>
                                <input type="password" class="form-control" id="" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>
                            
                        <br>
                            
                        <button type="submit" class="btn essence-btn">Créer un compte</button>
                        
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection