<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title', 'Liste des commandes')


@section('css')

  @include('admin.partials.table_css')
	
@endsection


@section('content')
    


<div class="main-content">
  <div class="section__content section__content--p30">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <!-- DATA TABLE -->
                  <h3 class="title-5 m-b-35">Commandes ({{ $count }} trouves)</h3>
                  <div class="table-data__tool">
                      <div class="table-data__tool-left">
                          <div class="rs-select2--light rs-select2--md">
                              <select class="js-select2" name="property">
                                  <option selected="selected">Toutes les commandes</option>
                                  <option value="">Option 1</option>
                                  <option value="">Option 2</option>
                              </select>
                              <div class="dropDownSelect2"></div>
                          </div>
                          <button class="au-btn-filter">
                              <i class="zmdi zmdi-filter-list"></i>filters</button>
                      </div>
                      <div class="table-data__tool-right">
                        @if(!empty($init))
                         
                        <a href="{{ route('form.product') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                          <i class="zmdi zmdi-plus"></i>Ajouter un produit</a>
                        
                        @else

                        <form method="post" action="{{ route('order.init') }}"> 
                          @csrf

                          <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                            <i class="zmdi zmdi-plus"></i>Initier la commande</button>
                        
                        </form>

                        @endif


                    </div>
                  </div>
                  <div class="table-responsive table-responsive-data2">
                    @if(!$orders->isEmpty())


                      <table class="table table-data2">
                          <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Date</th>
                                  <th>Commande ID</th>
                                  <th>Produit</th>
                                  <th>status</th>
                                  <th>sub-total</th>
                                  <th></th>
                              </tr>
                          </thead>
                          <tbody>

                            @foreach ($orders as $order)
                              <tr class="tr-shadow">
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ Carbon\Carbon::parse($order->created_at)->format('d-m-Y')  }}</td>
                                  <td class="desc">
                                  
                                  <a href="{{ route('order.single', ['id' => $order->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    #{{ $order->order_number }}
                                  </a>
                                  </td>
                                  <td>{{ $order->product_id }}</td>
                                  <td>
                                    @if($order->order_status == 1) 
                                    <span class="role member">Valide</span>
                                    @elseif($order->order_status == 2)
                                      <span class="role admin">En attente</span>
                                    @else
                                    <span class="role user">panier en attente</span>
                                    @endif
                                  </td>
                                  <td>{{ $order->order_price }}</td>
                                  <td>
                                    <div class="table-data-feature">
                                      
                                      <a href="{{ route('order.delete', ['id' => $order->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                          <i class="zmdi zmdi-delete"></i>
                                      </a>
                                  </div>
                                  </td>
                              </tr>
                              <tr class="spacer"></tr>
                              @endforeach
                          </tbody>
                      </table>

                      <br>
                         
                        {{ $orders->links() }}

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