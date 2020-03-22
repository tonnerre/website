
    <!-- Jquery JS-->
    <script src="{{ URL::to('admin/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ URL::to('admin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ URL::to('admin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ URL::to('admin/vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ URL::to('admin/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ URL::to('admin/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ URL::to('admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ URL::to('admin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL::to('admin/vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ URL::to('admin/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ URL::to('admin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ URL::to('admin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ URL::to('admin/vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ URL::to('admin/js/main.js') }}"></script>


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