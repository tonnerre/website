@extends('layouts.frontend')
@section('content')

     <!--================Cart Area =================-->
     <section class="cart_area">
        <div class="container">
            @if(!$carts->isEmpty())

            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Article
                                </th>
                                <th scope="col">Prix</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($carts as $cart)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{url('photo/'.$cart->cproduct_photo)}}" alt="{{ $cart->cproduct_name }}" height="100" width="150">
                                        </div>
                                        <div class="media-body">
                                            <p>{{ $cart->cproduct_name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{ $cart->cproduct_price }} FCFA</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="text" name="qty" id="sst" maxlength="12" value="{{ $cart->cproduct_quantity }}" title="Quantity:"
                                            class="input-text qty">
                                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                            class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
                                        <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                            class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{ $cart->cproduct_price }} FCFA  <a href="{{ route('cartitem.delete', ['id' => $cart->id]) }}"><i class="ti-trash"></i></a></h5>
                                </td>
                            </tr>
                            @endforeach
                       
                            <tr class="bottom_button">
                                <td>
                                    <a class="gray_btn" href="#">Update Cart</a>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="cupon_text d-flex align-items-center">
                                        <input type="text" placeholder="Coupon Code">
                                        <a class="primary-btn" href="#">Apply</a>
                                        <a class="gray_btn" href="#">Close Coupon</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Total</h5>
                                </td>
                                <td>
                                    <h5>{{ $carts->sum('cproduct_total') }} FCFA</h5>
                                </td>
                            </tr>
                           
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="gray_btn" href="#">Continuez vos achats</a>
                                        <a class="primary-btn" href="#">Passez votre commande</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

          
            @else
            Vous
            <a class="btn_1" href="/">Continuez vos achats</a>
           @endif
        </div>
    </section>
    <!--================End Cart Area =================-->

@endsection