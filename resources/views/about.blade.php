@extends('masterwelcome.masterwelcometemplate')
@section('content')
<link rel="stylesheet" href="">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
        <title>Contact Tracing</title>
        <link rel="stylesheet" href="style.css">
    
    </head>
    
    <body style="background: #021d31;">
        <nav class="navbar navbar-expand-xl navbar-dark bg-#021d31">
            <div class="container">
    
                <a class="navbar-brand fs-5 fw-bold text-white" href="#"><img class="img-fluid w-25 p-0"
                        src="{{ asset('images/logo.png') }}">All-in-<span class="text-danger">One</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarDark"
                    aria-controls="navbarDark" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse show" id="navbarDark">
                    <ul class="navbar-nav ms-auto mb-2 mb-xl-0 fs-5 ms-auto p-2 text-center">
                        <li class="nav-item me-3">
                            <a class="nav-link" aria-current="page" href="welcome">Home</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link  active " href="about">About</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="account">Account</a>
                        </li>
                        <li class="nav-item me-3">
                            <a class="nav-link" href="contact">Contact Us</a>
                        </li>
    
                    </ul>
    
                </div>
    
            </div>
    
    
        </nav>
    
        <!--Main Navigation-->
        <header>
            {{-- <style>
            /* Carousel styling */
            #introCarousel,
            .carousel-inner,
            .carousel-item,
            .carousel-item.active {
                height: 100vh;
            }
    
            .carousel-item:nth-child(1) {
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center center;
            }
    
            .carousel-item:nth-child(2) {
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center center;
            }
    
            .carousel-item:nth-child(3) {
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center center;
            }
    
            /* Height for devices larger than 576px */
            @media (min-width: 992px) {
                #introCarousel {
                    margin-top: -58.59px;
                }
            }
    
            .navbar .nav-link {
                color: #fff !important;
            }
        </style> --}}
    
        </header>
        <!--Main Navigation-->
    
        <!--Main layout-->
        <main class="mt-5">
          <div class="container">
              <!--Section: Content-->
              <section>
                  <div class="row">
                     
  
                      <div class="col-md-6 gx-5 mb-4">
                          <p class="text-white fw-bolder fs-1">ALL-IN-ONE. WHO ARE WE?</p>
                          
                          <p class="text-white fs-4 font-monospace">
                            We are the founders of the system designed to mitigate the effects of the rapidly spreading Covid-19 disease. Our intention is to enhance the current contact tracing system in Cabanatuan City by utilizing web technology and to expand the use of Philippine National Identification. <br><br> We guarantee that this platform will simplify the process for you. <br><br>Come and join us right now.
                          </p>
                          {{-- <p class="text-white fs-6"><strong>This is a product of human ingenuity and logical analysis; a system that will address the shortcomings of current system technology.</strong></p>
                          <p class="text-white">
                              Participate in our new contact tracing approach by logging in with your national ID to access your personal account or by signing up your company and transferring your contact tracing data. This will greatly assist in reducing the number of people infected with Covid-19 disease in our city.<br><br><p class="fw-bold text-white">What are you waiting for? Join us now!</p>
                          </p> --}}
                      </div>

                      <div class="col-md-6 gx-5 mb-4">
                        <div class="card mb-3" style="max-width: 50em;">
                          <div class="row g-0">
                            <div class="col-md-5">
                              <img src="images/about1.png" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-7 bg-dark text-white">
                              <div class="card-body ">
                                <h5 class="card-title">App Technology</h5>
                                <p class="card-text">The Scanner app transforms your mobile device into a powerful portable scanner that recognizes QR Codes. This increases your productivity by allowing you to save time and data more accurately. Download this scanner app to instantly scan, save, and transfer data to the website.</p>
                                <p class="card-text"><small class="text-muted">© 2022 | All-in-One Contact Tracing</small></p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card mb-3" style="max-width: 50em;">
                          <div class="row g-0">
                            <div class="col-md-5">
                              <img src="images/about2.png" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-7 bg-dark text-white">
                              <div class="card-body">
                                <h5 class="card-title">Web Technology</h5>
                                <p class="card-text">This website is typically dedicated to managing all user accounts and contact tracing. Access the website using your system roles. All of the features required to manage, track, and organize contact tracing data can be found here.</p>
                                <p class="card-text"><small class="text-muted">© 2022 | All-in-One Contact Tracing</small></p>
                              </div>
                            </div>
                          </div>
                        </div>
                        </div>
                    </div>
                  </div>
              </section>
          </div>
        </main>

        <!-- Optional JavaScript; choose one of the two! -->
    
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
            integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
        </script>
        -->
@endsection