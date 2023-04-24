@extends('master.logins')
@include('master.header2')

@section('content')

	<link rel="stylesheet" href="{{ asset('css/style-forgot-password-1.css') }}">
	<link rel="stylesheet" href="{{ asset('css/style-forgot-password-2.css') }}">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">

	
	<script src="{{ asset('/dashboard/plugins/jquery-validation/jquery.validate.js') }}"></script>

	<style>
		a {
			text-decoration: none;
			display: inline-block;
			color:white; }
			
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

		label.error {
			color: red;
			font-size: 14px;
		}
	</style>

	<div class="bg-login">
		<div class="main">
			<a href="{{config('app.url')}}account" style="font-size:26px;"  class="fa">&#xf191;</a>
			<input type="checkbox" id="chk" aria-hidden="true">
			<div class="signup">
				<form id="reset-form">
					<img src="{{ asset('images/logo.png') }}" class="logoestablishment">
					<label>Set New Password</label>
					<p>Set a new password for your account. Make sure to create a strong password that inlcude upper and lower case letters, numbers and puctuation marks.</p>
					<input type="password" id="password" name="password" placeholder="New Password" required>
					<input type="password" id="retype_password" name="retype_password" placeholder="Re-type Password" required>
					<button type="submit" class="btn">
						Reset Password
					</button>
				</form>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function () {
			var params = new URLSearchParams(window.location.search)
			var submitBtn = $('#reset-form').find('button[type="submit"]')
			var token = params.get('token')

			post(`${apiUrl}auth/reset-password/validate`, { token }).done((response) => {
				return true
			}).fail((error) => {
				errorAlert(
					'Encountered an error!', 
					error.responseJSON.message,
					() => {
						location.href = webUrl + 'account'
					}
				)
			})

			$("#reset-form").validate({
				rules: {
					password: "required",
					retype_password: {
						required: true,
						equalTo: "#password"
					}
				}
			})

			$(document).on('submit', '#reset-form', function (e) {
				e.preventDefault()
				var params = { password: $('#password').val() }
				$(submitBtn).html('Processing...')
            	$(submitBtn).prop('disabled', true)

				put(`${apiUrl}auth/reset-password/${token}`, params).done((response) => {
					successAlert(
						'Success!',
						'Your password has been successfully reset.',
						() => { 
							location.href = webUrl + 'account'
						}
					)
				}).fail((error) => {
					errorAlert(
						'Encountered an error!', 
						error.responseJSON.message,
						() => {
							location.href = webUrl + 'account'
						}
					)
				}).always(() => {
					$(submitBtn).html('Reset Password')
					$(submitBtn).prop('disabled', false)
				})
			})
		})
	</script>
@endsection
