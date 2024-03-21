<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo APP_NAME; ?></title>
	<link rel="icon" href="<?php echo APP_URL; ?>assets/logo.png">
	<link rel="stylesheet" href="<?php echo APP_URL; ?>css/login.css">
	<link rel="stylesheet" href="<?php echo APP_URL; ?>css/sweetalert2.min.css">
	<script src="<?php echo APP_URL; ?>js/sweetalert2.all.min.js"></script>
</head>

<body>
	<div class="container-form">
		<div class="background-overlay"></div>
		<div class="background">

			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj1.png');"></div>
			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj2.png');"></div>
			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj3.png');"></div>
			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj4.png');"></div>
			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj5.png');"></div>
			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj6.png');"></div>
			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj7.png');"></div>
			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj8.png');"></div>
			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj9.png');"></div>
			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj10.png');"></div>
			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj11.png');"></div>
			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj12.png');"></div>
			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj13.png');"></div>
			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj14.png');"></div>
			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj15.png');"></div>
			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj16.png');"></div>
			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj17.png');"></div>
			<div class="image" style="background-image: url('<?php echo APP_URL; ?>/assets/resources/obj1.png');"></div>

		</div>
		<div class="login-form">
			<h1><b><span class="white-text">FOR</span><span class="blue-text"> US</span></h1>
			<form class="box login" action="" method="POST" autocomplete="off">
				<input class="input" autofocus type="text" name="username" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required>
				<input class="input" type="password" name="password" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
				<div>
					<a href="<?php echo APP_URL; ?>user/recover" class="left">Forgot your password?</a>
					<a href="<?php echo APP_URL; ?>user/register" class="right">Don't have an account?</a>
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

	<script src="<?php echo APP_URL; ?>js/ajax.js"></script>
</body>

</html>