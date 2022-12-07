@extends('masterwelcome.masterwelcometemplate')
@section('content')
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('/css/libraries/jquery-confirm.min.css') }}">
  <script src="{{ asset('/js/common.js') }}"></script>

    {{-- <header>
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
    </header> --}}
	
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
						<img src=" {{ asset('images/citizen.png') }}" alt="" class="logoestablishment">
						<label>Citizens</label>
						<p>Cabanatuan City</p>
						<input type="email" name="email" placeholder="Email" required>
						<input type="password" name="password" placeholder="Password" required>
						<button type="submit" class="btn">
							Sign In
						</button>
					</form>
				</div>
			</div>
		</div>

	{{-- <div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form>
					<img src="images/citizen.png" alt="">
					<label class="label1" for="chk" aria-hidden="true">Citizen</label>
					<input type="text" name="txt" placeholder="Username" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<input type="txt" name="txt" placeholder="PhilSys Card Number" required="">
                    <p>Upload an image of your National ID QR Code</p>
					<input type="file" id="myFile" name="filename" required="">
					<button class="btn"><a href="cdashboard">Sign up</button></a>
				</form>
			</div>

			<div class="login">
				<form>
					<label class="label2" for="chk" aria-hidden="true">Sign In</label>
					<input type="email" name="email" placeholder="Email" required="" class='login1'>
					<input type="password" name="pswd" placeholder="Password" required="" class="login2">
					<button class="btn"><a href="cdashboard">Submit</button></a>
				</form>
			</div>
	</div> --}}
