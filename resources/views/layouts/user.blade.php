<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>aranoz</title>
    <link rel="icon" href="{{ URL::to('frontend/img/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::to('frontend/css/bootstrap.min.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ URL::to('frontend/css/animate.css') }}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{ URL::to('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('frontend/css/lightslider.min.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ URL::to('frontend/css/all.css') }}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{ URL::to('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ URL::to('frontend/css/themify-icons.css') }}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{ URL::to('frontend/css/magnific-popup.css') }}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{ URL::to('frontend/css/slick.css') }}">
     
    <link rel="stylesheet" href="{{ URL::to('frontend/css/slick-theme.min.css') }}">

    <link rel="stylesheet" href="{{ URL::to('frontend/css/price_rangs.css') }}">

    <link rel="stylesheet" href="{{ URL::to('frontend/css/nice-select.css') }}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ URL::to('frontend/css/style.css') }}">

    <link rel="stylesheet" href="{{ URL::to('frontend/css/nouislider.min.css') }}">

    <link rel="stylesheet" href="{{ URL::to('frontend/css/font-awesome.min.css') }}">
    
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                   <nav class="navbar navbar-expand-lg navbar-light">
                      <a class="navbar-brand" href="/"> <img src="{{ URL::to('frontend/img/logo.png') }}" alt="logo"> </a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>

                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <form class="form-inline my-2 my-lg-0">
                          <input class="form-control mr-sm-2" type="search" placeholder="Cherchez un produit, une catégorie" aria-label="Search">
                          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">RECHERCHER</button>
                        </form>
                      </div>
                       
                       <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="/">Home</a>
                                </li>
                                @guest
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user"></i> Se connecter
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="{{ route('login') }}">SE CONNECTER</a>
                                        <hr>
                                        <a class="dropdown-item" href="{{ route('register') }}">CREER UN COMPTE</a>
                                    </div>
                                </li>
                                @else
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user"></i> {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href=""> blog</a>
                                        <a class="dropdown-item" href="">Single blog</a>
                              
                                     @if(auth()->user()->is_admin == 1) 
                                      <a class="dropdown-item" href="{{url('admin/dashboard')}}">Admin </a>
                                      @else
                                       @endif
    
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    </div>
                                </li>
                                @endguest
               
                                <li class="nav-item">
                                    <a class="nav-link" href=""><i class="fas fa-cart-plus"></i> Panier</a>
                                </li>
                            </ul>
                        </div>
                   </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    @yield('content')

    <!--::footer_part start::-->
    <footer class="footer_part">
            <div class="row justify-content-around">
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Top Produits</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Managed Website</a></li>
                            <li><a href="">Manage Reputation</a></li>
                            <li><a href="">Power Tools</a></li>
                            <li><a href="">Marketing Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Liens Rapides</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Jobs</a></li>
                            <li><a href="">Brand Assets</a></li>
                            <li><a href="">Investor Relations</a></li>
                            <li><a href="">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Features</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Jobs</a></li>
                            <li><a href="">Brand Assets</a></li>
                            <li><a href="">Investor Relations</a></li>
                            <li><a href="">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-2">
                    <div class="single_footer_part">
                        <h4>Resources</h4>
                        <ul class="list-unstyled">
                            <li><a href="">Guides</a></li>
                            <li><a href="">Research</a></li>
                            <li><a href="">Experts</a></li>
                            <li><a href="">Agencies</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="single_footer_part">
                        <h4>Newsletter</h4>
                        <p>Heaven fruitful doesn't over lesser in days. Appear creeping
                        </p>
                        <div id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="subscribe_form relative mail_part">
                                <input type="email" name="email" id="newsletter-form-email" placeholder="Adresse Email"
                                    class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = ' Email Address '">
                                <button type="submit" name="submit" id="newsletter-submit"
                                    class="email_icon newsletter-submit button-contactForm">s'inscrire</button>
                                <div class="mt-10 info"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        <div class="copyright_part">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer_icon social_icon">
                            <ul class="list-unstyled">
                                <li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <script src="{{ URL::to('frontend/js/jquery-1.12.1.min.js') }}"></script>

    <script src="{{ URL::to('frontend/js/jquery.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ URL::to('frontend/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ URL::to('frontend/js/bootstrap.min.js') }}"></script>
    <!-- easing js -->
    <script src="{{ URL::to('frontend/js/jquery.magnific-popup.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ URL::to('frontend/js/swiper.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ URL::to('frontend/js/lightslider.min.js') }}"></script>
    <!-- swiper js -->
    <script src="{{ URL::to('frontend/js/masonry.pkgd.js') }}"></script>
    <!-- particles js -->
    <script src="{{ URL::to('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::to('frontend/js/jquery.nice-select.min.js') }}"></script>
    <!-- slick js -->
    <script src="{{ URL::to('frontend/js/slick.min.js') }}"></script>
    <script src="{{ URL::to('frontend/js/nouislider.min.js') }}"></script>
    <script src="{{ URL::to('frontend/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ URL::to('frontend/js/waypoints.min.js') }}"></script>
    <script src="{{ URL::to('frontend/js/contact.js') }}"></script>
    <script src="{{ URL::to('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ URL::to('frontend/js/jquery.form.js') }}"></script>
    <script src="{{ URL::to('frontend/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ URL::to('frontend/js/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::to('frontend/js/mail-script.js') }}"></script>
    <!-- custom js -->
    <script src="{{ URL::to('frontend/js/custom.js') }}"></script>

    <script src="{{ URL::to('frontend/js/main.js') }}"></script>

    <script src="{{ URL::to('frontend/js/price_rangs.js') }}"></script>

    <script src="{{ URL::to('frontend/js/jquery.nice-select.min.js') }}"></script>

    <script src="{{ URL::to('frontend/js/stellar.js') }}"></script>
</body>

</html>