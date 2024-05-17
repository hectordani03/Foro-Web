<?php
setHeader($d, "login", "sweetalert2.min");
?>

<div class="container-form">
	<div class="background-overlay"></div>
	<div class="background">

		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj1.png');"></div>
		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj2.png');"></div>
		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj3.png');"></div>
		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj4.png');"></div>
		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj5.png');"></div>
		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj6.png');"></div>
		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj7.png');"></div>
		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj8.png');"></div>
		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj9.png');"></div>
		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj10.png');"></div>
		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj11.png');"></div>
		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj12.png');"></div>
		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj13.png');"></div>
		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj14.png');"></div>
		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj15.png');"></div>
		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj16.png');"></div>
		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj17.png');"></div>
		<div class="image" style="background-image: url('<?php echo CAT_IMG; ?>obj1.png');"></div>
	</div>
	<div class="login-form">
		<h1><b><span class="text-white">FOR</span><span class="text-blue"> US</span></h1>
		<form class="box login" id="login-form" method="POST" autocomplete="off" enctype="multipart/form-data">
			<input class="input" autofocus type="email" id="email" name="email" required>
			<input class="input" type="password" id="password" name="password" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@.\-])[A-Za-z\d$@.\-]{7,100}$" minlength="7" maxlength="100" required>
			<div>
				<a href="/Account/recover" class="left">Forgot your password?</a>
				<a href="/register" class="right">Don't have an account?</a>
			</div>
			<button type="submit">Log in</button>
		</form>
	</div>

</div>

<?php
setFooter($d, "sweetalert2.all.min", "jquery", "auth");
?>
<script>
	$(function() {
		auth.login()
	})
</script>
<?php
closeFooter();
