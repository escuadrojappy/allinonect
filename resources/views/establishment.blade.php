@extends('master.logins')
@include('master.header2')
@section('content')
    <link rel="stylesheet" href="{{ asset('/css/libraries/jquery-confirm.min.css') }}">
    <script src="{{ asset('/js/common.js') }}"></script>

    <header>
      <img src="{{ asset('images/logo.png')}}" alt="" id= "logo" >
      <div class="menu-btn"></div>
      <div class="navigation">
        <div class="navigation-items">
          <a href="/allinonect/public/welcome">Home </a>
          <a href="/allinonect/public/about">About</a>
          <a href="/allinonect/public/account" class="under">Account</a>
          <a href="/allinonect/public/contact">Contact Us</a>
        </div>
      </div>
    </header>
	
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/doh.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/libraries/jquery-confirm.min.css') }}">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">

		<div class="bg-login">
			<div class="main">
				<input type="checkbox" id="chk" aria-hidden="true">
				<div class="signup">
					<form id="login-form">
						<img src=" {{ asset('images/Establishment.png') }}" alt="" class="logoestablishment">
						<label>Establishment</label>
						<p>Business Premises</p>
						<input type="email" name="email" placeholder="Email" required>
						<input type="password" name="password" placeholder="Password" required>
						<button type="submit" class="btn">
							Sign In
						</button>
					</form>
				</div>
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
                    if (user.role_id !== 2) {
                        errorAlert(
                            'Encountered an error!',
                            'Unauthorized User',
                            () => {
                                get(`${apiUrl}auth/logout`).done(() => {
                                    location.href = webUrl + 'login/establishment'
                                })
                            }
                        )
                    } else {
                        location.href = webUrl + 'establishment/dashboard'
                    }
                }).fail((error) => {
                    if (error.status == 401) {
                        errorAlert('Encountered an error!', 'Please match your registered email address and password.')
                    }
                })
            })
        })
	</script>
@endsection