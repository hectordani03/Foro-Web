<?php
setHeader($d, "register", "sweetalert2.min");
?>

<div class="container-form">
    <video autoplay loop muted src="<?php echo VIDEO; ?>gradient.mp4"></video>
    <div class="login-form">
        <h1><b><span class="white-text">Create</span><span class="blue-text"> Account</span></b></h1>

        <form class="" id="register-form" method="POST" autocomplete="off" enctype="multipart/form-data">

            <input placeholder="Username" class="input" type="text" id="username" name="username" pattern="^[a-zA-Z0-9]{1,100}$" minlength="3" maxlength="40" required>
            <input placeholder="Email" class="input" type="email" id="email" name="email" minlength="6" maxlength="70" required>

            <input placeholder="Password" class="input" type="password" id="password" name="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@.\-])[A-Za-z\d$@.\-]{7,100}$" minlength="7" maxlength="100" required>

            <input placeholder="Confirm Password" class="input" type="password" id="password2" name="password2" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@.\-])[A-Za-z\d$@.\-]{7,100}$" minlength="7" maxlength="100" required>
            <div>
                <a href="login"><span class="white-text">Do you already</span> <span class="blue-text"> have an account?</span></a>
            </div>
            <button type="submit">Register</button>
        </form>

    </div>
</div>

<?php
setFooter($d, "sweetalert2.all.min", "jquery", "auth");
?>
<script>
    $(function() {
        auth.register()
    })
</script>
<?php
closeFooter();
