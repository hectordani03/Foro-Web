<?php
require_once './config/controllers.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>For Us - Login</title>
	<link rel="stylesheet" href="../css/styles.css">
	<script src="<?php echo APP_URL; ?>app/layouts/js/sweetalert2.all.min.js"></script>

</head>

<body>

	<div class="container-form">
		<div class="background-overlay"></div>
		<div class="background">
			<!-- Agrega las 17 imágenes aquí -->
			<div class="image" style="background-image: url('../../src/assets/resources/obj1.png');"></div>
			<div class="image" style="background-image: url('../../src/assets/resources/obj2.png');"></div>
			<div class="image" style="background-image: url('../../src/assets/resources/obj3.png');"></div>
			<div class="image" style="background-image: url('../../src/assets/resources/obj4.png');"></div>
			<div class="image" style="background-image: url('../../src/assets/resources/obj5.png');"></div>
			<div class="image" style="background-image: url('../../src/assets/resources/obj6.png');"></div>
			<div class="image" style="background-image: url('../../src/assets/resources/obj7.png');"></div>
			<div class="image" style="background-image: url('../../src/assets/resources/obj8.png');"></div>
			<div class="image" style="background-image: url('../../src/assets/resources/obj9.png');"></div>
			<div class="image" style="background-image: url('../../src/assets/resources/obj10.png');"></div>
			<div class="image" style="background-image: url('../../src/assets/resources/obj11.png');"></div>
			<div class="image" style="background-image: url('../../src/assets/resources/obj12.png');"></div>
			<div class="image" style="background-image: url('../../src/assets/resources/obj13.png');"></div>
			<div class="image" style="background-image: url('../../src/assets/resources/obj14.png');"></div>
			<div class="image" style="background-image: url('../../src/assets/resources/obj15.png');"></div>
			<div class="image" style="background-image: url('../../src/assets/resources/obj16.png');"></div>
			<div class="image" style="background-image: url('../../src/assets/resources/obj17.png');"></div>
			<div class="image" style="background-image: url('../../src/assets/resources/obj1.png');"></div>
			<!-- Agrega las imágenes restantes aquí -->
		</div>
		<div class="login-form">
			<h1><b><span class="white-text">FOR</span><span class="blue-text"> US</span></h1>
			<form class="box login" action="" method="POST" autocomplete="off">
				<input class="input" type="text" name="username" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required>
				<input class="input" type="password" name="password" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
				<button type="submit">Log in</button>
			</form>
		</div>

	</div>
</body>

</html>

<?php
if (isset($_POST['username']) && isset($_POST['password'])) {
	$insLogin->loginController();
}
?>