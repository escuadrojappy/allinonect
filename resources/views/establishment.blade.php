@extends('masterwelcome.masterwelcometemplate')
@section('content')
    

    <link rel="stylesheet" href="{{ asset('/css/libraries/jquery-confirm.min.css') }}">
    <script src="{{ asset('/js/common.js') }}"></script>
   
    </script>
  
	
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

			{{-- <div class="signup">
				<form id="registrationForm">
				<img src="{{ asset('images/Establishment.png')}}" alt="" id= "logo" >
					<label class="label1" for="chk" aria-hidden="true">Establishment</label>
					<input type="email" name="email" placeholder="Email" id="email" required>
					<input type="text" name="name" placeholder="Business Name" id="business_name" required>
					<textarea name="business_address" rows="3" placeholder="Business Address" id="business_address" required></textarea>
					<input type="number" name="contact_number" placeholder="Contact Number" id="contact_number" required>
					<button type="submit" class="btn">Sign up</button>
					<button type="reset" class="btn-reset">Reset</button>
				</form>
			</div> --}}

			{{-- <div class="login">
				<form>
					<label class="label2" for="chk" aria-hidden="true">Sign In</label>
					<input type="email" name="email" placeholder="Email" required="" class='login1'>
					<input type="password" name="password" placeholder="Password" required="" class="login2">
					<button class="btn">Submit</button>
				</form>
			</div> --}}
	</div>

			

	<script>
		$(document).ready(function () {
			$(document).on('submit', '#registrationForm', function (e){
				e.preventDefault()
				var params = {
					email: $('#email').val(),
					name: $('#business_name').val(),
					address: $('#business_address').val(),
					contact_number: $('#contact_number').val(),
					role_id: 2
				}
				$.post(`${apiUrl}auth/registration`, params).done((result) => {
                    alert('Successfully Created!')
					$( '#registrationForm' )[0].reset()
                }).fail((error) => {
                    alert(error.responseJSON.message)
                })
			})
		}) 
	</script>
@endsection