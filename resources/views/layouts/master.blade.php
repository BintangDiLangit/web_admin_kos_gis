<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from mannatthemes.com/dastone/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Dec 2022 00:49:12 GMT -->

@include('layouts.head')

<body class="">
    <!-- Left Sidenav -->
    @include('layouts.sidebar')
    <!-- end left-sidenav-->


    <div class="page-wrapper">
        <!-- Top Bar Start -->
        @include('layouts.navbar')
        <!-- Top Bar End -->

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')


            </div><!-- container -->

            @include('layouts.footer')
            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->




    @include('layouts.script')

</body>


<!-- Mirrored from mannatthemes.com/dastone/default/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Dec 2022 00:52:33 GMT -->

</html>
