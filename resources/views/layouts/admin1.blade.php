<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ URL::to('admin/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('admin/assets/vendors/iconfonts/ionicons/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ URL::to('admin/assets/vendors/iconfonts/typicons/src/font/typicons.css') }}">
    <link rel="stylesheet" href="{{ URL::to('admin/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ URL::to('admin/assets/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ URL::to('admin/assets/vendors/icheck/skins/all.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ URL::to('admin/assets/css/shared/style.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ URL::to('admin/assets/css/demo_1/style.css') }}">

    <link rel="stylesheet" href="{{ URL::to('admin/assets/vendors/iconfonts/font-awesome/css/font-awesome.min.css') }}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{ URL::to('admin/assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      @include('admin.partials.nav1')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        @include('admin.partials.nav')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          

         </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019 <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
              </span>
            </div>
          </footer>
          <!-- partial -->
        
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ URL::to('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ URL::to('admin/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ URL::to('admin/assets/js/shared/off-canvas.js') }}"></script>
    <script src="{{ URL::to('admin/assets/js/shared/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->

    <script type="text/javascript">
      function loadPreview(input, id){
          id = id || '#preview_img';
          if(input.files && input.files[0]){
              var reader = new FileReader();

              reader.onload = function (e) {
                  $(id)
                  .attr('src', e.target.result)
                  .width(200)
                  .height(150);
              };

              reader.readAsDataURL(input.files[0]);
          }
      }
  </script>

  </body>
</html>