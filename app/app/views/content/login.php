<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Foronu Hub - Login</title>
	<link rel="stylesheet" href="./css/login.css">
</head>

<body>
	<div class="container-form">
		<div class="background-overlay"></div>
		<div class="background">

			<div class="image" style="background-image: url('./assets/resources/obj1.png');"></div>
			<div class="image" style="background-image: url('./assets/resources/obj2.png');"></div>
			<div class="image" style="background-image: url('./assets/resources/obj3.png');"></div>
			<div class="image" style="background-image: url('./assets/resources/obj4.png');"></div>
			<div class="image" style="background-image: url('./assets/resources/obj5.png');"></div>
			<div class="image" style="background-image: url('./assets/resources/obj6.png');"></div>
			<div class="image" style="background-image: url('./assets/resources/obj7.png');"></div>
			<div class="image" style="background-image: url('./assets/resources/obj8.png');"></div>
			<div class="image" style="background-image: url('./assets/resources/obj9.png');"></div>
			<div class="image" style="background-image: url('./assets/resources/obj10.png');"></div>
			<div class="image" style="background-image: url('./assets/resources/obj11.png');"></div>
			<div class="image" style="background-image: url('./assets/resources/obj12.png');"></div>
			<div class="image" style="background-image: url('./assets/resources/obj13.png');"></div>
			<div class="image" style="background-image: url('./assets/resources/obj14.png');"></div>
			<div class="image" style="background-image: url('./assets/resources/obj15.png');"></div>
			<div class="image" style="background-image: url('./assets/resources/obj16.png');"></div>
			<div class="image" style="background-image: url('./assets/resources/obj17.png');"></div>
			<div class="image" style="background-image: url('./assets/resources/obj1.png');"></div>

		</div>
		<div class="login-form">
			<h1><b><span class="white-text">FOR</span><span class="blue-text"> US</span></h1>
			<form class="box login" action="" method="POST" autocomplete="off">
				<input class="input" autofocus type="text" name="username" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required>
				<input class="input" type="password" name="password" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
				<div>
					<a href="<?php echo APP_URL; ?>recover" class="left">Forgot your password?</a>
					<a href="<?php echo APP_URL; ?>register" class="right">Don't have an account?</a>
				</div>
				<button type="submit">Log in</button>
			</form>
		</div>

	</div>

	<?php
	if (isset($_POST['username']) && isset($_POST['password'])) {
		$insLogin->loginController();
	}
	?>
</body>

</html>