<?php 
	if(isset($_SESSION['ID']))
	{
		echo '<script language="javascript">location.href="DailyReport/index";</script>';
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login KGIM</title>
	<meta charset="UTF-8">
	<base href="http://192.168.1.5/KLTN/">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="./public/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./public/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./public/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./public/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./public/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./public/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./public/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./public/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./public/dist/css/util.css">
	<link rel="stylesheet" type="text/css" href="./public/dist/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('./public/images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					KGIM
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post" action="User/UserLogin">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" name="btnLogin">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="./public/vendor/jquery/jquery.min.js"></script>
<!--===============================================================================================-->
	<script src="./public/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="./public/vendor/bootstrap/js/popper.js"></script>
	<script src="./public/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="./public/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="./public/vendor/daterangepicker/moment.min.js"></script>
	<script src="./public/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="./public/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="./public/dist/js/main.js"></script>

</body>
</html>