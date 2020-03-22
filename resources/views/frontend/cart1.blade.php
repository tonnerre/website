@extends('layouts.frontend')

@section('content')
@include('frontend.partials.nav')
<!-- BREADCRUMB -->
<div id="breadcrumb">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Checkout</li>
        </ul>
    </div>
</div>
<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form id="checkout-form" class="clearfix">
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Mon panier</h3>
							</div>

                            @if(!$carts->isEmpty())

							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th></th>
										<th class="text-center">Price</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>

									@foreach ($carts as $cart)
									<tr>
										<td class="thumb"> <img src="{{url('photo/'.$cart->cproduct_photo)}}" alt="{{ $cart->cproduct_name }}" height="100" width="150">
										</td>
										<td class="details">
											<a href="#">{{ $cart->cproduct_name }}</a>
										</td>
										<td class="price text-center"><strong>{{ $cart->cproduct_price }} FCFA</strong><br><del class="font-weak"><small>$40.00</small></del></td>
										<td class="qty text-center"><input class="input" type="number" value="{{ $cart->cproduct_quantity }}"></td>
										<td class="total text-center"><strong class="primary-color">{{ $cart->cproduct_total }} FCFA</strong></td>
										<td class="text-right"><a href="{{ route('cartitem.delete', ['id' => $cart->id]) }}"><button type="button" class="main-btn icon-btn"><i class="fa fa-close"></i></button></a></td>
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<th colspan="2" class="total">{{ $carts->sum('cproduct_total') }} FCFA</th>
									</tr>
								</tfoot>
							</table>
							<div class="pull-right">
								<a class="primary-btn" href="/">Continuez vos achats</a>
							
								  
								  <form method="post" action="{{ route('add.cart') }}" enctype="multipart/form-data">
									  {{csrf_field()}}
								  <input type="hidden" value="1" name="cart_active">
								  <a href="" class="btn_1 checkout_btn_1 btn">Proceder checkout</a>
								  </form>
							
								  
								 <form method="post" action="{{ route('add.cart') }}" enctype="multipart/form-data">
									  {{csrf_field()}}
								  <input type="hidden" value="1" name="cart_active">
								  <button type="submit" class="primary-btn">Proceder checkout</button>
								  </form>
					
						
							  </div>
							 @else
							 Vous
							 <a class="btn_1" href="/">Continuez vos achats</a>
							@endif
						</div>

					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

@endsection