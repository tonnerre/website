<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Tonnerre Admin - @yield('title')</title>


    @yield('css')

</head>

<body class="animsition">
    <div class="page-wrapper">

        @include('admin.partials.header_mobile')

        <!-- MENU SIDEBAR-->
        @include('admin.partials.menu_sidebar')
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
        
        @include('admin.partials.header_desktop')
            <!-- MAIN CONTENT-->
           
            @yield('content')
        
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
      
    @yield('script')

</body>

</html>
<!-- end document-->
