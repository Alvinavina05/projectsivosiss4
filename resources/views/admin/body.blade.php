@include('admin.head')
   
    <!-- Preloader - style you can find in spinners.css -->
   
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
   
    <!-- Main wrapper - style you can find in pages.scss -->
       
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">



       
        <!-- Topbar header - style you can find in pages.scss -->
       
        
<!-- narbarr -->
@include('admin.navbar')
    


<!-- sidebarrr -->
@include('admin.sidebar')
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- Page wrapper  -->
        <div class=" page-wrapper">

            <!-- Bread crumb and right sidebar toggle -->

            <!-- <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Good Morning Jason!</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="col-5 align-self-center">
                        <div class="customize-input float-end">
                            <select class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius">
                                <option selected>Aug 23</option>
                                <option value="1">July 23</option>
                                <option value="2">Jun 23</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div> -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <div class="mb-4 container-fluid">
             
@yield('konten')
                
            </div>
            <!-- End Container fluid  -->

<br>
<br>
<br>
            <!-- footer -->
            <footer class=" bg-white footer text-center text-muted">
                <div class="mt-2 mb-2">
                    All Rights Reserved by <a
                    href="#">SI-VOSIS</a>.
                <div>
                
            </footer>
        </div>

    </div>

    <script src="{{asset('assets')}}/libs/jquery/dist/jquery.min.js">
    </script>
    <script src="{{asset('assets')}}/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{asset('assets')}}/dist/js/app-style-switcher.js"></script>
    <script src="{{asset('assets')}}/dist/js/feather.min.js"></script>
    <script src="{{asset('assets')}}/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{asset('assets')}}/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('assets')}}/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="{{asset('assets')}}/extra-libs/c3/d3.min.js"></script>
    <script src="{{asset('assets')}}/extra-libs/c3/c3.min.js"></script>
    <script src="{{asset('assets')}}/libs/chartist/dist/chartist.min.js"></script>
    <script src="{{asset('assets')}}/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="{{asset('assets')}}/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{asset('assets')}}/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <!-- <script src="{{asset('assets')}}/dist/js/pages/dashboards/dashboard1.min.js"></script> -->
</body>

</html>