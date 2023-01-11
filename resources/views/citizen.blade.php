@extends('master.logins')
@include('master.header2')

@section('content')
  
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/doh.css') }}">
	
	<style>
	a {
		text-decoration: none;
		display: inline-block;
		color:white;
	}
	
	a:hover {
		color: #b8b537;
	}
</style>


	
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">

		<div class="bg-login">
			<div class="main">
			<a href="{{config('app.url')}}account" style="font-size:26px;"  class="fa">&#xf191;</a>
				<input type="checkbox" id="chk" aria-hidden="true">
				<div class="signup">
					<form id="login-form">
						<img src="{{config('app.url')}}images/acccitizens.png" alt="" class="logoestablishment">
						<label>Citizens</label>
						<p>Cabanatuan City</p>
						<input type="text" name="email" placeholder="Email" required>
						<input type="password" name="password" placeholder="Password" required>
						<button type="submit" class="btn">
							Sign In
						</button>
					    <a href="{{config('app.url')}}forgot-password" class="text-center">Forgot Password?</a>
					</form>
				</div>
			</div>
		</div>

<script>
		$(document).ready(function () {
            $(document).on('submit', '#login-form', function (e) {
                e.preventDefault()
                var params = {}
                $('#login-form input').each((key, element) => {
                    var name = $(element).attr('name')
                    var value = $(element).val()
                    params[name] = value
                })
				post(`${apiUrl}auth/login`, params).done(({ user }) => {
                    if (user.role_id !== 3) {
                        errorAlert(
                            'Encountered an error!',
                            'Unauthorized User',
                            () => {
                                get(`${apiUrl}auth/logout`).done(() => {
                                    location.href = webUrl + 'login/citizen'
                                })
                            }
                        )
                    } else {
                        location.href = webUrl + 'citizen/dashboard'
                    }
                }).fail((error) => {
                    if (error.status == 401) {
                        errorAlert('Encountered an error!', 'Please match your registered email address and password.')
                    }
                })
            })
        })
</script>
