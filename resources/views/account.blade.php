<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Account</title>
    <link rel="stylesheet" href="">

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
                        <a class="nav-link" href="about">About</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link active" href="account">Account</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link" href="contact">Contact Us</a>
                    </li>

                </ul>

            </div>

        </div>


    </nav>


    <main class="mt-5">
        <div class="container">
            <!--Section: Content-->
            <section>
                <div class="row">
                    
                    <div class="col-md-6 gx-5 mb-4">
                        <p class="text-white fw-bolder fs-1">Access the Website</p>
                        
                        <p class="text-white fs-5 font-monospace">
                            The All-in-One Contact Tracing System authorized users are as follows. Please select who you want to gain access from.
                        {{-- </p>
                        <p class="text-white fs-6"><strong>This is a product of human ingenuity and logical analysis; a system that will address the shortcomings of current system technology.</strong></p>
                        <p class="text-white">
                            Participate in our new contact tracing approach by logging in with your national ID to access your personal account or by signing up your company and transferring your contact tracing data. This will greatly assist in reducing the number of people infected with Covid-19 disease in our city.<br><br><p class="fw-bold text-white">What are you waiting for? Join us now!</p>
                        </p> --}}

                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col">
                              <div class="card">
                                <img src="images/people.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title text-center"><a href="login/citizen" class="btn btn-primary">For Cabanatuan City Residents</a></h5>
                                  <p class="card-text text-center">Sign in using the information from your scanned national ID.</p>
                                </div>
                              </div>
                            </div>
                            <div class="col">
                              <div class="card">
                                <img src="images/firms.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title text-center"><a href="login/establishment" class="btn btn-primary">For Cabanatuan City Firms</a></h5>
                                  <p class="card-text text-center">Don't have an account? Register your company with the DOH Office.</p>
                                </div>
                              </div>
                            </div>
        
                            <div class="col">
                              <div class="card">
                                <img src="images/health.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title text-center"><a href="login/admin" class="btn btn-primary">For Department Of Health</a></h5>
                                  <p class="card-text text-center">Sign in with your administrator account login information.</p>
                                </div>
                              </div>
                            </div>
                          </div>

                    </div>

					<div class="col-md-6 gx-5 mb-5">
                        <div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
                            <img src="images/acc.png" class="img-fluid w-80 float-end" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>
                    </div>
                    
                    
                </div>
				

            </section>
        </div>
    </main>


    {{-- <div class="container"> --}}

    {{-- <div class="content">
				  <div class="left-side">
					<div class="address details">
					  <i class="fas fa-map-marker-alt"></i>
					  <img src="{{ asset('images/icon.png')}}" alt="" id= "logo" >
					  <label for="chk" aria-hidden="true">Sign In</label>
					<p>The All-in-One Contact Tracing System authorized users are as follows. Please select who you want to gain access from.</p>
					</div>
				  </div>
				  <div class="right-side">
					{{-- <div class="topic-text">Send us a message</div> --}}

    {{-- <div class="input-box">
					  <button class="btn"><a href="login/citizen">For Cabanatuan City Resident</button></a>
					</div>
			
					<div class="input-box">
						<button class="btn"><a href="login/establishment">For Business Owner</button></a>
					</div>
			
					<div class="input-box">	
						<button class="btn"><a href="login/admin">For Department of Health</button></a>
					</div> --}}
    {{-- <div class="btn">
					  <button type="submit">Send</button>
			
					</div> --}}
    {{-- </div>
				</div> --}}
    {{-- </div> --}}

    {{-- </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
