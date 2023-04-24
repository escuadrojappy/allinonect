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

        .btn-process{
            border:none;
            outline:none;
            display: flex;
            align-items:center;
            justify-content: center;
            color:#fff;
            cursor:pointer;
            }
            .btn-ring{
            display: none;
            }
            .btn-ring:after {
            content: "";
            display: block;
            width: 15px;
            height: 15px;
            margin: 6px;
            border-radius: 50%;
            border: 3px solid #fff;
            border-color: #fff transparent #fff transparent;
            animation: ring 1.2s linear infinite;
            }
            @keyframes ring {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
            }
	</style>

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
					<button type="submit" class="btn btn-process">
						Send Reset Password Link
                        <span class="btn-ring"></span>
					</button>
			    </div>
		    </div>
	    </div>
    </form>

	<script>
        var submitBtn = $('#login-form').find('button[type="submit"]')

        $(document).on('submit', '#login-form', function (e) {
            e.preventDefault()

            var params = {
                email: $('#email').val()
            }
            
            $(submitBtn).html('Processing...')
            $(submitBtn).prop('disabled', true)

            post(`${apiUrl}auth/forgot-password`, params).done((response) => {
                successAlert(
                    'Success!',
                    'A reset password link has been successfully delivered. Please check your email to reset.',
                    () => { 
                        location.href = webUrl + 'account'
                    }
                )
            }).fail((error) => {
                errorAlert('Error!', error.responseJSON.message)
            }).always(() => {
                $(submitBtn).html('Send Reset Password Link')
                $(submitBtn).prop('disabled', false)
            })
            
        })
    </script>
@endsection
