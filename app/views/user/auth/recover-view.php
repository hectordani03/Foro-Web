<?php
setHeader($d, "recover", "sweetalert2.min");
?>

<div class="container-form">
    <div class="background-overlay"></div>
    <img class="" src="http://forus.com/resources/assets/img/categories/banners/onu-4.jpeg" alt="">
    <div class="login-form">
        <h1><b><span class="white-text">Recover your</span><span class="blue-text"> Password</span></b></h1>
		<form id="recover-form" method="POST" autocomplete="off" enctype="multipart/form-data">
            <h1 class="text">Enter your new Password:</h1>
            <input placeholder="Enter your new password" class="input" type="password" id="password" name="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@.\-])[A-Za-z\d$@.\-]{7,100}$" minlength="7" maxlength="100" required>

            <input placeholder="Confirm your new password" class="input" type="password" id="password2" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@.\-])[A-Za-z\d$@.\-]{7,100}$" minlength="7" maxlength="100" required>

            <input type="hidden" name="token" value="<?=$d->csrf?>">
            <button type="submit" class="send-btn">Send</button>
            <button type="reset" class="cancel-btn">Cancel</button>
        </form>
    </div>
</div>
<?php
setFooter($d, "sweetalert2.all.min", "jquery", "functions", "auth");
?>
<script>
	$(function() {
		auth.chgPasswd()
	})
</script>
<?php
closeFooter();
