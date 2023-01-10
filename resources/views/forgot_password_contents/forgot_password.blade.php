@extends('master.logins')
@include('master.header2')

@section('content')

	<link rel="stylesheet" href="{{ asset('css/doh.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	
	<!-- Jquery Confirm CSS -->
	<link href="{{ asset('/css/libraries/jquery-confirm.min.css') }}" rel="stylesheet">
	<!-- Sweet Alert Css -->
	{{-- <link href="{{ asset('/dashboard/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet" /> --}}	
	{{-- <script src="{{ asset('/dashboard/plugins/sweetalert/sweetalert.min.js') }}"></script> --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>	


	<style>
		a {
			text-decoration: none;
			display: inline-block;
			color:white; 
		}
	
  		a:hover {
			color: #b8b537;
		}

		.jconfirm-holder {
			width: 400px;
    		margin: auto;
		}

		.jconfirm-holder .jconfirm-buttons button {
			width: 100%;
		}
	</style>

	{{-- <header>
      <img src="{{ asset('images/logo.png')}}" alt="" id= "logo" >
      <div class="menu-btn"></div>
      <div class="navigation">
        <div class="navigation-items">
          <a href="{{config('app.url')}}welcome">Home </a>
          <a href="{{config('app.url')}}about">About</a>
          <a href="{{config('app.url')}}account" class="under">Account</a>
          <a href="{{config('app.url')}}contact">Contact Us</a>
        </div>
      </div>
    </header> --}}
    <form id="login-form">
	<div class="bg-login">
		<div class="main">
			<a href="{{config('app.url')}}account" style="font-size:26px;"  class="fa">&#xf191;</a>
			<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				
					<img src="{{ asset('images/logo.png') }}" class="logoestablishment">
					<label>Forgot your password?</label>
					<p>Enter your email address to reset your password.</p>
					<input type="email" id='email' name="email" placeholder="Enter email here" required>
					<button type="submit" class="btn">
						Send Reset Password Link
					</button>
				</form>
			</div>
		</div>
	</div>

	<script>
       
	// 	 $(document).on('submit', '#login-form', function (e) {
    //     e.preventDefault()
    //     formLoader('#login-form')
    //     var params = {
    //         email: $('#email').val()
    //     }
    //         $.post(`${apiUrl}forgot`, params).done((result) => {
    //             successAlert(
    //                 'Success!',
    //                 'Successfully Registered Establishment.',
    //                 () => { 
    //                     clearFormFields('#login-form')
    //                 }
    //             )
    //         }).always(() => {
    //             rollBackButtons('#login-form')
            
				
    //         })

    // })

    $(document).on('submit', '#login-form', function (e) {
        e.preventDefault()
        formLoader('#login-form')
        var params = {
            email: $('#email').val(),

        }
            $.post(`${apiUrl}forgot`, params).done((result) => {
                successAlert(
                    'Success!',
                    'Successfully Registered Establishment.',
                    () => { 
                        clearFormFields('#login-form')

                    }
                )
            }).fail((error) => {
                errorAlert('Error!', error.responseJSON.message)
            }).always(() => {
                rollBackButtons('#login-form')
            })
        
    })
    </script>
		

@endsection
