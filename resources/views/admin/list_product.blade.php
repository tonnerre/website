<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title', 'Liste des produits')


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
                    <h3 class="title-5 m-b-35">produits ({{ $count }} trouves)</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" name="property">
                                    <option selected="selected">Tous les produits</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <button class="au-btn-filter">
                                <i class="zmdi zmdi-filter-list"></i>filters</button>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('form.product') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                <i class="zmdi zmdi-plus"></i>ajouter un produit</a>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">

                        @if(!$products->isEmpty())

                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nom</th>
                                    <th>Qty</th>
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
                                    <td class="desc"><a href="{{ route('product.single', ['id' => $product->id]) }}"> {{ $product->product_name }}</a></td>
                                    <td>{{ $product->units }}</td>
                                    <td>{{ Carbon\Carbon::parse($product->created_at)->format('d-m-Y')  }}</td>
                                   </td>
                                    <td>
                                        <span class="role member">En Stock</span>
                                    </td>
                                    <td>{{ $product->product_price }} FCFA</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a href="{{ route('product.edit', ['id' => $product->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a href="{{ route('product.delete', ['id' => $product->id]) }}" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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
                         
                        {{ $products->links() }}

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