<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For-Us</title>
    <link rel="stylesheet" href="<?php echo APP_URL; ?>/css/register.css">
    <link rel="stylesheet" href="<?php echo APP_URL; ?>css/sweetalert2.min.css">
	<script src="<?php echo APP_URL; ?>js/sweetalert2.all.min.js"></script>

</head>

<body>

    <div class="container-form">
        <video autoplay loop muted src="<?php echo APP_URL; ?>/assets/resources/gradient.mp4"></video>
        <div class="login-form">
            <h1><b><span class="white-text">Create</span><span class="blue-text"> Account</span></b></h1>
            <form class="requestForm" action="<?php echo APP_URL; ?>user/requestControllers/users/userRequest.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <input type="hidden" name="user_module" value="userRegister">

                <input placeholder="Username" class="input" type="text" name="username" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" maxlength="40" required>
                <input placeholder="Email" class="input" type="email" name="email" maxlength="70" required>
                <input placeholder="Password" class="input" type="password" name="password" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
                <input placeholder="Confirm Password" class="input" type="password" name="confirm_password" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
                <div>
                    <a href="<?php echo APP_URL; ?>user/login"><span class="white-text">Do you already</span> <span class="blue-text"> have an account?</span></a>
                </div>
                <button type="submit">Register</button>

                <button type="reset">Cancel</button>
            </form>
        </div>
    </div>
    <script src="<?php echo APP_URL; ?>js/ajax.js"></script>

</body>

</html>