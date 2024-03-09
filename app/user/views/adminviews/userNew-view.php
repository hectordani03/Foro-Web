<div class="container pb-6 pt-6">

	<form class="ajaxForm" action="<?php echo APP_URL; ?>user/ajax/ajaxUser.php" method="POST" autocomplete="off" enctype="multipart/form-data">

		<input type="hidden" name="user_module" value="admin_registration">

		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Username</label>
					<input class="input" type="text" name="username" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Email</label>
					<input class="input" type="email" name="email" maxlength="70" required>
				</div>
			</div>
		</div>
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Password</label>
					<input class="input" type="password" name="password" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
				</div>
			</div>
			<div class="column">
				<div class="control">
					<label>Confirm Password</label>
					<input class="input" type="password" name="confirm_password" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
				</div>
			</div>
		</div>
		<div class="columns">
			<div class="column">
				<div class="control">
					<label>Role</label>
					<select name="role" class="form-select form-control" required>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3" selected>3</option>
				</div>
			</div>
		</div>
		<div class="columns">
			<div class="column">
				<div class="file has-name is-boxed">
					<label class="file-label">
						<input class="file-input" type="file" name="user_profile_photo" accept=".jpg, .png, .jpeg">
						<span class="file-cta">
							<span class="file-label">
								Select Picture
							</span>
						</span>
						<span class="file-name">JPG, JPEG, PNG. (MAX 5MB)</span>
					</label>
				</div>
			</div>
		</div>
		<p class="has-text-centered">
			<button type="reset" class="button is-link is-light is-rounded">Cancel</button>
			<button type="submit" class="button is-info is-rounded">Add</button>
		</p>
	</form>
</div>