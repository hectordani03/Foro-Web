<?php
setHeader($d, "login", "sweetalert2.min");
?>

<div class="container-form">
	<div class="background-overlay"></div>
	<div class="background">

		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj1.png');"></div>
		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj2.png');"></div>
		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj3.png');"></div>
		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj4.png');"></div>
		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj5.png');"></div>
		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj6.png');"></div>
		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj7.png');"></div>
		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj8.png');"></div>
		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj9.png');"></div>
		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj10.png');"></div>
		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj11.png');"></div>
		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj12.png');"></div>
		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj13.png');"></div>
		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj14.png');"></div>
		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj15.png');"></div>
		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj16.png');"></div>
		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj17.png');"></div>
		<div class="image" style="background-image: url('<?php echo LOGIN_IMG; ?>obj1.png');"></div>
	</div>
	<div class="login-form">
		<h1><b><span class="text-white">FOR</span><span class="text-blue"> US</span></h1>
		<form class="box login" id="login-form" method="POST" autocomplete="off" enctype="multipart/form-data">
			<input class="input" autofocus type="email" id="email" name="email" required>
			<input class="input" type="password" id="password" name="password" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
			<div>
				<small class="form-text text-danger d-none" id="error">
					Incorrect fields
				</small>
				<a href="/Account/recover" class="left">Forgot your password?</a>
				<a href="/register" class="right">Don't have an account?</a>
			</div>
			<button type="submit">Log in</button>
		</form>
	</div>

</div>

<?php
setFooter($d, "sweetalert2.all.min", "alerts", "jquery", "app");
?>
<script>
	$(function() {
		const loginForm = $("#login-form")
		loginForm.on("submit", function(e) {
			e.preventDefault()
			e.stopPropagation()
			const data = new FormData(this)
			fetch(app.routes.session, {
					method: "POST",
					body: data
				}).then(res => res.json())
				.then(res => {
					if (res.r) {
						location.href = "/"
					} else {
						$("#error").removeClass("d-none")
					}
				})
		})
	})
</script>
<?php
closeFooter();
