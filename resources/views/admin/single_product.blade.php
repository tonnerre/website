<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title', 'Product')


@section('css')

  @include('admin.partials.table_css')
	
@endsection


@section('content')
    

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                   <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Produit #{{ $product->id }}
                                <small>
                                    <span class="badge badge-success float-right mt-1">En Stock</span>
                                </small>
                            </strong>
                        </div>
                        <div class="card-body">
                            <div class="media">
                                    <div class="media-body">
                                        <h3 class="display-6">{{ $product->product_name }}</h3>
                                        <br>
                                        <p>Prix: {{ $product->product_price }} FCFA</p>
                                        <hr>
                                        <p>Marque: {{ $product->brand_name }}</p>
                                        <hr>
                                        <p>{{ $product->product_description }}</p>
                                        <hr>
                                        <p>Categorie: Mode - homme</p>
                                        <hr>
                                        <p>Type: {{ $product->type_name }}</p>
                                        <hr>
                                        <p>Quantite: {{ $product->units }}</p>
                                        
                                    </div>
                                </div>
                        </div>
                    </div>

                     
                    <form method="post" action="{{ route('order.confirm') }}"> 
                        @csrf
    
                    <input type="hidden" name="order_id" value="">
                    
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i> publier le produit</button>
                    </form>
                </div>

              

                <div class="col-lg-4">
                    
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header user-header alt bg-dark">
                                <div class="media">
                                    <a href="#">
                                        <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{url('photo/'.$product->product_photo)}}">
                                    </a>
                                    <div class="media-body">
                                        <h2 class="text-light display-6"></h2>
                                        <p></p>
                                    </div>
                                </div>
                            </div>


                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <a href="{{ route('product.edit', ['id' => $product->id]) }}">
                                        <i class="fa fa-edit"></i> Modifier
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">
                                        <i class="fa fa-tasks"></i> Ajouter des details
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">
                                        <i class="fa fa-bell-o"></i> Ajouter des photo
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('product.delete', ['id' => $product->id]) }}">
                                        <i class="fa fa-trash"></i> Supprimer 
                                    </a>
                                </li>
                            </ul>
                            
                            <br>
                            
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Rupture de stock 
                                    </button>

                        </section>
                    </aside>
                
                </div>
                
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

  @include('admin.partials.table_script')
	
@endsection