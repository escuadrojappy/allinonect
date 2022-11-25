@extends('master.logins')

@section('content')

	<link rel="stylesheet" href="{{ asset('css/doh.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
	<style>
		
	</style>
	<header>
      <img src="{{ asset('images/logo.png')}}" alt="" id= "logo" >
      <div class="menu-btn"></div>
      <div class="navigation">
        <div class="navigation-items">
          <a href="/allinonect/public/welcome">Home </a>
          <a href="/allinonect/public/about">About</a>
          <a href="/account" class="under">Account</a>
          <a href="/allinonect/public/contact">Contact Us</a>
        </div>
      </div>
    </header>

	<div class="bg-login">
		<div class="main">
			<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form id="login-form">
					<img src="{{ asset('images/doh.png') }}" class="logoestablishment">
					<label>Department of Health</label>
					<p>Administrator Account</p>
					<input type="email" name="email" placeholder="Email" required>
					<input type="password" name="password" placeholder="Password" required>
					<button type="submit" class="btn">
						Sign In
					</button>
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

				$.post(`${apiUrl}auth/login`, params).done((result) => {
					console.log(result)
					location.href = '/allinonect/public/admin/dashboard'
				}).fail((error) => {
					if (error.status == 401) {
						$.confirm({
							title: 'Encountered an error!',
							content: 'Please match your registered email address and password.',
							type: 'red',
							typeAnimated: true,
							buttons: {
								tryAgain: {
									text: 'Try again!',
									btnClass: 'btn-red',
									action: function(){
									}
								},
								close: function () {
								}
							}
						});
						// $.alert({
						// 	title: error.responseJSON.message,
						// 	content: 'Please match your registered email address and password.',
						// 	boxWidth: '300px',
						// 	useBootstrap: false 
						// })
					}
					
				})


				// console.log(`${apiUrl}registration`)
			})
		})
	</script>
@endsection
