<?php
setHeader($d, "recover", "sweetalert2.min");
?>

<div class="container-form">
    <video autoplay loop muted src="<?php echo VIDEO; ?>gradient.mp4"></video>
    <div class="login-form">
        <h1><b><span class="white-text">Recover your</span><span class="blue-text"> Password</span></b></h1>
		<form id="verify-form" method="POST" autocomplete="off" enctype="multipart/form-data">
            <h1 class="text">Enter the code sent to your email to recover your password:</h1>
            <input type="text" name="code" placeholder="Enter the code">
            <input type="hidden" name="token" value="<?=$d->csrf?>">
            <button type="submit" class="send-btn">Send</button>
            <button type="reset" class="cancel-btn">Cancel</button>
            <!-- <a class="animate" href="/login" class="left"><span class="white-text">Back to</span><span class="blue-text"> log in</span></a> -->
        </form>
    </div>
</div>
<?php
setFooter($d, "sweetalert2.all.min", "jquery", "functions", "auth");
?>
<script>
	$(function() {
		auth.verifyCode()
	})
</script>
<?php
closeFooter();
