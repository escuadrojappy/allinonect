@extends('masterwelcome.masterwelcometemplate')
@section('content')

{{-- <meta name=”viewport” content=”width=device-width, initial-scale=1.0">
<link rel=”stylesheet” href=”css/bootstrap.css”>
<link rel=”stylesheet” href=”css/bootstrap-responsive.css”>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<header>
      <img src="{{ asset('images/logo.png')}}" alt="" id= "logo" >
      <div class="menu-btn"></div>
      <div class="navigation">
        <div class="navigation-items">
          <a href="welcome" class="under">Home </a>
          <a href="about" >About</a>
          <a href="account">Account</a>
          <a href="contact">Contact Us</a>
        </div>
      </div>
    </header> --}}


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
                        <a class="nav-link active " aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="about">About</a>
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
                        <div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
                            <img src="images/1.png" class="img-fluid" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 gx-5 mb-4">
                        <p class="text-white fw-bolder fs-1">BE A PART OF OUR TEAM</p>
                        <figure>
                            <blockquote class="blockquote text-white">
                                <p>"Alone, we can do so little; together, we can do so much."</p>
                            </blockquote>
                            <figcaption class="blockquote-footer text-white">
                                Hellen <cite title="Source Title">Keller</cite>
                            </figcaption>
                        </figure>
                        <p class="text-white fs-5">
                            Humanity will not perish in the face of a destructive disease. People are intelligent, creative, and can adapt to any situation quickly. Each contribution will play an important role to the future people aspire. There is great strength in coming together as one, as a team. A strength that will undoubtedly empower us in resolving any hurdles in our journey.
                        </p>
                        <p class="text-white fs-6"><strong>This is a product of human ingenuity and logical analysis; a system that will address the shortcomings of current system technology.</strong></p>
                        <p class="text-white">
                            Participate in our new contact tracing approach by registering for an account at the Department of Health Office. If you currently have an account, try logging in and accessing the website with the necessary and appropriate login credentials. This will greatly help in reducing the number of people infected with Covid-19 disease in our city.<br><br><p class="fw-bold text-white">What are you waiting for? Join us now!</p>
                        </p>
                    </div>
                </div>
            </section>
            <!--Section: Content-->

            <hr class="my-5" />

            <!--Section: Content-->
            <section class="text-center mt-3">
                <h4 class="mb-5 text-white font-monospace h1"><strong>Protect People. Save the World. Trace
                        quickly.</strong></h4>

                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="images/2.png" class="img-fluid" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Contacts of Exposure</h5>
                                <p class="card-text">
                                    Contact tracing is the process of assisting patients and notifying contacts of
                                    exposure in order to break the chain of transmission. In this innovative
                                    methodology, we utilise web technology to perform contact tracing more efficiently
                                    and accurately.
                                </p>
                                {{-- <a href="account" class="btn btn-secondary">Explore</a> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="images/3.png" class="img-fluid" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Covid-19 Pandemic</h5>
                                <p class="card-text">
                                    COVID-19 is a respiratory disease caused by the coronavirus SARS-CoV-2, which was
                                    discovered in 2019. The virus spreads primarily through respiratory droplets from
                                    person to person. Unfortunately, the virus has not yet been eradicated.
                                </p>
                                {{-- <a href="account" class="btn btn-secondary">Explore</a> --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="images/4.png" class="img-fluid" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">We're all in this together</h5>
                                <p class="card-text">
                                    The primary purpose of the website is to continuously monitor and contact people who
                                    have been exposed. The most effective method of preventing rapid Covid-19 disease
                                    transmission. Your participation will improve the efficiency of contact tracing.
                                </p>
                                {{-- <a href="account" class="btn btn-secondary">Explore</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Section: Content-->

            <hr class="my-5" />

            {{-- <!--Section: Content-->
        <section class="mb-5">
            <h4 class="mb-5 text-center">
                <strong>Facilis consequatur eligendi</strong>
            </h4>

            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <form>
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form3Example1" class="form-control" />
                                    <label class="form-label" for="form3Example1">First name</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="text" id="form3Example2" class="form-control" />
                                    <label class="form-label" for="form3Example2">Last name</label>
                                </div>
                            </div>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="form3Example3" class="form-control" />
                            <label class="form-label" for="form3Example3">Email address</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="form3Example4" class="form-control" />
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>

                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-center mb-4">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3"
                                checked />
                            <label class="form-check-label" for="form2Example3">
                                Subscribe to our newsletter
                            </label>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-block mb-4">
                            Sign up
                        </button>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>or sign up with:</p>
                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </button>

                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-google"></i>
                            </button>

                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                            </button>

                            <button type="button" class="btn btn-primary btn-floating mx-1">
                                <i class="fab fa-github"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!--Section: Content--> --}}
        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer class="bg-light text-lg-start">
        <div class="py-4 text-center">
            <a role="button" class="btn btn-primary btn-lg m-2" href="about" rel="nofollow" target="_blank">
                Discover Our Goals
            </a>
            <a role="button" class="btn btn-primary btn-lg m-2" href="account" target="_blank">
                Take Part in Our Strategy
            </a>
        </div>

        <hr class="m-0" />

        <div class="text-center py-4 align-items-center">
            <p>Find us on Social Media</p>
            <a href="https://www.facebook.com/profile.php?id=100088405794131&mibextid=ZbWKwL" class="m-1" role="button"
                rel="nofollow" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-facebook" viewBox="0 0 16 16">
                    <path
                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                </svg>
            </a>
            <a href="https://twitter.com/allinonect?t=PKBeOT1XO5XXqxUYQLDxig&s=09" class="m-1" role="button" rel="nofollow"
                target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-twitter" viewBox="0 0 16 16">
                    <path
                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                </svg>
            </a>
            <a href="https://instagram.com/allinonect?igshid=YmMyMTA2M2Y=" class="m-1" role="button" rel="nofollow" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-instagram" viewBox="0 0 16 16">
                    <path
                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                </svg>
            </a>
            {{-- <a href="https://github.com/mdbootstrap/mdb-ui-kit" class="m-1" role="button" rel="nofollow"
                target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-github" viewBox="0 0 16 16">
                    <path
                        d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                </svg>
            </a> --}}
        </div>

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2022 :
            <a class="text-dark" href="">All-in-One Contact Tracing</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!--Footer-->


    {{-- <section class="home">
  
      <img src="{{asset('images/1.png')}}" class="video-slide1 active">
      <img src="{{asset('images/2.png')}}" class="video-slide2">
      <img src="{{asset('images/3.png')}}" class="video-slide3">
      <img src="{{asset('images/4.png')}}" class="video-slide1">

      <div class="content active">
        <h1>be a part of our<br><span>team</span></h1>
        <p>Participate in our new contact tracing approach by signing up your company and transferring your contact tracing data. This will help our city decrease the number of individuals infected with Covid-19 disease. What precisely are you waiting for? Join us right now!</p>
        <a href="account">Explore</a>
      </div>
      <div class="content">
        <h1>Contacts of<br><span>exposure</span></h1>
        <p>Contact tracing is the process of assisting patients and notifying contacts of exposure in order to break the chain of transmission. In this innovative methodology, we utilise web technology to perform contact tracing more efficiently and accurately.</p>
        <a href="account">Explore</a>
      </div>
      <div class="content">
        <h1>COVID-19.<br><span>Pandemic</span></h1>
        <p>COVID-19 is a respiratory disease caused by the coronavirus SARS-CoV-2, which was discovered in 2019. The virus spreads primarily through respiratory droplets from person to person. Unfortunately, the virus has not yet been eradicated. As of October 2022, there were 10,120 confirmed cases in the Philippines.</p>
        <a href="account" id="a3">Explore</a>
      </div>
      <div class="content">
        <h1>We're all in this<br><span>Together</span></h1>
        <p>The primary purpose of the website is to continuously monitor and contact people who have been exposed. This could be the most effective method of preventing rapid Covid-19 disease transmission. Your participation will improve the efficiency of contact tracing.</p>
        <a href="account">Explore</a>
      </div>
      <div class="media-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
      </div>
      <div class="slider-navigation">
        <div class="nav-btn active"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
      </div>
    </section>

    <script type="text/javascript">
    //Javacript for responsive navigation menu
    const menuBtn = document.querySelector(".menu-btn");
    const navigation = document.querySelector(".navigation");

    menuBtn.addEventListener("click", () => {
      menuBtn.classList.toggle("active");
      navigation.classList.toggle("active");
    });

    //Javacript for video slider navigation
    const btns = document.querySelectorAll(".nav-btn");
    const slides = document.querySelectorAll(".video-slide, .video-slide2, .video-slide1, .video-slide3");
    const contents = document.querySelectorAll(".content");

    var sliderNav = function(manual){
      btns.forEach((btn) => {
        btn.classList.remove("active");
      });

      slides.forEach((slide) => {
        slide.classList.remove("active");
      });

      contents.forEach((content) => {
        content.classList.remove("active");
      });

      btns[manual].classList.add("active");
      slides[manual].classList.add("active");
      contents[manual].classList.add("active");
    }

    btns.forEach((btn, i) => {
      btn.addEventListener("click", () => {
        sliderNav(i);
      });
    });
    </script> --}}

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