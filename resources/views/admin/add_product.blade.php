<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title', 'Ajouter un produit')


@section('css')

  @include('admin.partials.index_css')
	
@endsection


@section('content')
    
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            @include('admin.partials.message_errors')
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">Produit</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Ajouter produit</h3>
                            </div>
                            <hr>
                            <form method="post" novalidate="novalidate" action="{{ route('add.product') }}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Nom du produit</label>
                                    <input id="cc-pament" name="product_name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Prix du produit</label>
                                    <input id="cc-pament" name="product_price" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Quantite du produit</label>
                                    <input id="cc-pament" name="units" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Description du produit</label>
                                    <textarea name="product_description" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">Ajouter la Categorie</label>
                                   <select name="category_id" id="select" class="form-control">
                                    @if(!$categories->isEmpty())
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"> {{ $category->category_name }} </option>
                                        @endforeach
                                    @else
                                        <option value=""> Pas de catégorie disponible </option>
                                    @endif
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-exp" class="control-label mb-1">Ajouter le type</label>
                                            <select name="type_name" id="select" class="form-control">
                                                @if(!$types->isEmpty())
                                                @foreach ($types as $type)
                                                  <option value="{{ $type->type_name }}"> {{ $type->type_name }} </option>
                                                @endforeach
                                             @else
                                                 <option value=""> Pas de type disponible </option>
                                             @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="x_card_code" class="control-label mb-1">Ajouter la marque</label>
                                        <select name="brand_name" id="select" class="form-control">
                                            @if(!$brands->isEmpty())
                                            @foreach ($brands as $brand)
                                              <option value="{{ $brand->brand_name }}"> {{ $brand->brand_name }} </option>
                                            @endforeach
                                         @else
                                             <option value=""> Pas de marque disponible </option>
                                         @endif
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">Ajouter une photo</label>
                                 </div>

                                <div class="form-group">
                                   <img id="preview_img" src="http://127.0.0.1:8000/admin/images/icon/avatar-01.jpg" width="200" height="150"/>
              
                                        <input type="file" name="product_photo" class="form-control" id="category_photo" onchange="loadPreview(this);">
                                </div>
                                
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Ajouter</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('script')

  @include('admin.partials.index_script')
	
@endsection