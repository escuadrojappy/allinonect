<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Contact Tracing</title>
  <link rel="stylesheet" href="{{ asset('css/establishment.css') }}">

</head>
<body>

<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body style="background: url('accountbg.jpg')">
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form>
				<img src="{{ asset('images/Establishment.png')}}" alt="" id= "logo" >
					<label class="label1" for="chk" aria-hidden="true">Establishment</label>
					<input type="text" name="txt" placeholder="Username" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<input type="txt" name="txt" placeholder="Business Name" required="">
					<input type="txt" name="txt" placeholder="Permit Number" required="">
					<button class="btn"><a href="edashboard">Sign up</button></a>
				</form>
			</div>

			<div class="login">
				<form>
					<label class="label2" for="chk" aria-hidden="true">Sign In</label>
					<input type="email" name="email" placeholder="Email" required="" class='login1'>
					<input type="password" name="pswd" placeholder="Password" required="" class="login2">
					<button class="btn"><a href="edashboard">Submit</button></a>
				</form>
			</div>
	</div>
</body>
</html>


</body>
</html>
