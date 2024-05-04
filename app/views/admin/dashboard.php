<div class="text-content container is-fluid">
	<h1 class="title">Home</h1>
	<div class="columns is-flex is-justify-content-center">
		<figure>
			<?php
			if (is_file(PROF_IMG . $_SESSION['photo'])) {
				echo '<img class="profile-img mx-auto recorte" id="preview_image" src="' . PROF_IMG . $_SESSION['photo'] . '">';
			} else {
				echo '<img class="profile-img mx-auto recorte" id="preview_image" src="' . PROF_IMG . 'default.png">';
			}
			?>
		</figure>
	</div>
	<div class="columns is-flex is-justify-content-center">
		<h2 class="subtitle">¡Bienvenido <?php echo $_SESSION['username']; ?>!</h2>
	</div>
</div>