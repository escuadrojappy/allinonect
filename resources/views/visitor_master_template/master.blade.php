<!DOCTYPE html>
<html>
    <head>
        @include('visitor_master_template.head')
        <style>
            .btn-modal-add {
                margin-top: -5px;
            }

            .modal .modal-header .modal-title {
                color: black;
            }
            .dohpicture {
                height: 250px;
                border: 2px solid #2196F3 !important;
            }
            .headercolor {
                background-color: #021d31 !important;
            }
            
            .buttonprofile {
                width: 130px;
            }

           /* Button used to open the contact form - fixed at the bottom of the page */
            .open-button {
            background-color: #2196F3;
            color: white;
            font-family: Helvetica;
            padding: 12px 16px;
            border: none;
            cursor: pointer;
            opacity: 0.7;
            width: 160px;
            }

            /* The popup form - hidden by default */
            .form-popup {
            display: none;
            position: absolute;
            right: 1px;
            bottom: 0;
            border: 3px solid #f1f1f1;
            }

            /* Add styles to the form container */
            .form-container {
            max-width: 400px;
            padding: 10px;
            background-color: white;
            }

            /* Full-width input fields */
            .form-container input[type=text], .form-container input[type=email] {
            width: 100%;
            padding: 15px;
            margin: 0px 0 10px 0;
            border: none;
            background: #f1f1f1;
            }

            /* When the inputs get focus, do something */
            .form-container input[type=text]:focus, .form-container input[type=email]:focus {
            background-color: #ddd;
            outline: none;
            }

            /* Set a style for the submit/login button */
            .form-container .btn{
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom:15px;
            opacity: 0.8;
            }

            /* Add a red background color to the cancel button */
            .form-container .cancel {
            background-color: red;
            }

            /* Add some hover effects to buttons */
            .form-container .btn:hover, .open-button:hover {
            opacity: 1;
            }

            .topcolor{
                background: #0A2558;
            }
            .leftcolor{
                background: #0c387a !important;
            }
        </style>
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
        @include('visitor_master_template.navbar')
        <!-- #Top Bar -->
        <!-- Left Sidebar -->
        @include('visitor_master_template.sidebar')
        <!-- #END# Left Sidebar -->

        <section class="content">
            @yield('content')
        </section> 

        <!-- Footer -->
        @include('admin_master_template.footer')
        <!-- #END# Footer -->
    </body>
</html>