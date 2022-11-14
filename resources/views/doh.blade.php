<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Contact Tracing</title>
  <link rel="stylesheet" href="{{ asset('css/doh.css') }}">

</head>
<body>

<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body style="background: url({{ asset('images/hospital.jpg')}});background-repeat:no-repeat;background-size:100% 100%;">
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form>
				<img src="{{ asset('images/doh.png')}}" alt="" id= "logo" >
					<label>Department of Health</label>
					<p>Administrator Account</p>
					<input type="text" name="txt" placeholder="Username" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<a href="dohdashboard"><button class="btn">Sign In</a></button>
				</form>
			</div>
	</div>
</body>
</html>


</body>
</html>
