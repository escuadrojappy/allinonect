<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Contact Tracing</title>
  <link rel="stylesheet" href="{{ asset('css/account.css') }}">

</head>
<body>
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body style="background: url(bgbgacc.jpg);background-repeat:no-repeat;background-size:100% 122%;">
	<div class="main">
		{{-- <input type="checkbox" id="chk" aria-hidden="true"> --}}
			{{-- <div class="form">
				<form>
					<img src="{{ asset('images/logo.png')}}" alt="" id= "logo" >
					<label for="chk" aria-hidden="true">Create an Account</label>
					<p>The system's authorized users are as follows. Please select who you want to gain access from.</p>
					<button class="btn"><a href="citizen">Citizen</button></a>
					<button class="btn"><a href="establishment">Establishment</button></a>
					<button class="btn"><a href="login/admin">Department of Health</button></a>
				</form>
			</div> --}}

			<div class="container">
		
				<div class="content">
				  <div class="left-side">
					<div class="address details">
					  <i class="fas fa-map-marker-alt"></i>
					  <img src="{{ asset('images/logo.png')}}" alt="" id= "logo" >
					  <label for="chk" aria-hidden="true">Create an Account</label>
					<p>The All-in-One Contact Tracing System authorized users are as follows. Please select who you want to gain access from.</p>
					</div>
				  </div>
				  <div class="right-side">
					{{-- <div class="topic-text">Send us a message</div> --}}
				
					<div class="input-box">
					  <button class="btn"><a href="citizen">Are you a resident of Cabanatuan City?</button></a>
					</div>
			
					<div class="input-box">
						<button class="btn"><a href="establishment">Are you a business owner?</button></a>
					</div>
			
					<div class="input-box">	
						<button class="btn"><a href="login/admin">Are you a staff of the health department?</button></a>
					</div>
					{{-- <div class="btn">
					  <button type="submit">Send</button>
			
					</div> --}}
				</div>
				</div>
			  </div>

	</div>
</body>
</html>


</body>
</html>
