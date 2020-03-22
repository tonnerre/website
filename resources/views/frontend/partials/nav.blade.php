    <!-- ##### Header Area Start ##### -->
     <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="/"><img src="{{ URL::to('frontend/img/core-img/logo.png') }}" alt="" style="width:230px; padding-bottom:10px;"></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="#">Categories</a>
                                <div class="megamenu">
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Femme</li>
                                        <li><a href="shop.html">Dresses</a></li>
                                        <li><a href="shop.html">Blouses &amp; Shirts</a></li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                        <li><a href="shop.html">Rompers</a></li>
                                        <li><a href="shop.html">Bras &amp; Panties</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Homme</li>
                                        <li><a href="shop.html">T-Shirts</a></li>
                                        <li><a href="shop.html">Polo</a></li>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                        <li><a href="shop.html">Trench</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Enfant</li>
                                        <li><a href="shop.html">Dresses</a></li>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                        <li><a href="shop.html">Trench</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Accessoires</li>
                                        <li><a href="shop.html">Dresses</a></li>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                        <li><a href="shop.html">Trench</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="/products">Catalogue</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Cherchez un article , une marque">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>

                @guest
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="{{ route('login') }}"><img src="{{ URL::to('frontend/img/core-img/heart.svg') }}" alt=""></a>
                </div>
                <!-- User Login Info -->
                <div class="user-login-info">
                    <a href="{{ route('login') }}"><img src="{{ URL::to('frontend/img/core-img/user.svg') }}" alt=""></a>
                </div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="{{ route('login') }}" id="essenceCartBtn"><img src="{{ URL::to('frontend/img/core-img/bag.svg') }}" alt=""> <span>0</span></a>
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->
    @else

           <!-- Favourite Area -->
           <div class="favourite-area">
            <a href="#"><img src="{{ URL::to('frontend/img/core-img/heart.svg') }}" alt=""></a>
        </div>
        <!-- User Login Info -->
        <div class="user-login-info">
            <a href="{{url('/account')}}"><img src="{{ URL::to('frontend/img/core-img/user.svg') }}" alt=""></a>
        </div>
        <!-- Cart Area -->
        <div class="cart-area">
            <a href="{{url('/cart')}}" id="essenceCartBtn"><img src="{{ URL::to('frontend/img/core-img/bag.svg') }}" alt=""> <span>{{ \DB::table('orders')->where('user_id', '=', auth()->user()->id)->where('order_status', '=', 0)->count()}}</span></a>
        </div>
    </div>

</div>
</header>
<!-- ##### Header Area End ##### -->

    @endguest