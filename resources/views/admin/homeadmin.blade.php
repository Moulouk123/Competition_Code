<!DOCTYPE html>
<html lang="en">
@include('admin/styles')

<body>
<div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    @include('admin/header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        @include('admin/settings')
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('admin/left')

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

                @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            @include('admin/footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
@include('admin/scripts')
<!-- End custom js for this page-->
</body>

</html>

