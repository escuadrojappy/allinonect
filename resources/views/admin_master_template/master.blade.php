<!DOCTYPE html>
<html>
    <head>
        @include('admin_master_template.head')
    </head>
    <body class="theme-green">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->
        <!-- Search Bar -->
        <div class="search-bar">
            <div class="search-icon">
                <i class="material-icons">search</i>
            </div>
            <input type="text" placeholder="START TYPING...">
            <div class="close-search">
                <i class="material-icons">close</i>
            </div>
        </div>
        <!-- #END# Search Bar -->
        <!-- Top Bar -->
        @include('admin_master_template.navbar')
        <!-- #Top Bar -->
        <!-- Left Sidebar -->
        @include('admin_master_template.sidebar')
        <!-- #END# Left Sidebar -->

        <section class="content">
            @yield('content')
        </section> 

        <!-- Footer -->
        @include('admin_master_template.footer')
        <!-- #END# Footer -->
    </body>
</html>