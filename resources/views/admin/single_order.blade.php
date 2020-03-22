<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title', 'Dashboard')


@section('css')

  @include('admin.partials.table_css')
	
@endsection


@section('content')
    

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            @include('admin.partials.message_errors')
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                <h3 class="title-5 m-b-35">Commande: #{{ $order->order_number }}</h3>
                
                @if($order->order_status == 2)
                  <h5>Statut: En attente de confirmation</h5>
                @elseif($order->is_delivered == 0)
                <h5>Statut: Livraison en attente</h5>
                @elseif($order->is_delivered == 1)
                <h5>Statut: Livraison en cours</h5>
                @elseif($order->is_delivered == 2)
                <h5>Statut: Livraison terminee</h5>
                @else
                <h5>Statut: Commande confirme</h5>
                @endif
                    
                    <div class="table-data__tool">
                        
                        
                        <div class="table-data__tool-left">
                        <h5>Frais de livraison: {{ $order->delivery_fee }} FCFA</h5>
                         <br>
                        <h4>Total: {{ $price }}  FCFA</h4>
                        </div>


                        <div class="table-data__tool-right">
                            
                            @if($order->order_status == 2)
                           
                           
                            <form method="post" action="{{ route('order.confirm') }}"> 
                                @csrf

                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i> Valider la commande</button>
                            </form>

                            @else

                            <form method="post" action="{{ route('order.confirm') }}"> 
                                @csrf

                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i> Valider la livraison</button>
                            </form>

                            @endif


                        </div>
                    </div>
                    
                    <br>
                    
                    <h4> Adresse de Livraison</h4>
                    <hr>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Numero</th>
                                    <th>Ville/Commune</th>
                                    <th>Adresse de livraison</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <tr class="tr-shadow">
                                <td class="desc">{{$user->firstname}} {{ $user->lastname }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->commune }} {{ $user->city}}</td>
                                    <td>
                                       {{ $user->address }}
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <br>
                    
                    <h4>{{ $count }} Produit(s)</h4>
                    <hr>
                    
                    <div class="table-responsive table-responsive-data2">
                    @if(!$products->isEmpty())
                     

                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nom</th>
                                    <th>Quantite</th>
                                    <th>date</th>
                                    <th>status</th>
                                    <th>prix</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($products as $product)
                                <tr class="tr-shadow">
                                    <td><div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="{{url('photo/'.$product->product_photo)}}" alt="John Doe">
                                        </div>
                                    </div>
                                    </div></td>
                                    <td class="desc">{{ $product->product_name }}</td>
                                    <td>{{ $product->units }}</td>
                                    <td>{{ Carbon\Carbon::parse($product->created_at)->format('d-m-Y')  }}</td>
                                    <td>
                                        <span class="status--process">En Stock</span>
                                    </td>
                                    <td>{{ $product->product_price }} FCFA</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                @endforeach
                    
                            </tbody>
                        </table>
                       
                        @else
                      pas de produit disponible
                      @endif

                    </div>
                    <!-- END DATA TABLE -->
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