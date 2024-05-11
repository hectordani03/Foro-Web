<?php
require_once LAYOUTS_AD . 'header.php';
?>
<div class="text-content container is-fluid">
	<h1 class="title">Home</h1>
	<div class="columns is-flex is-justify-content-center">
		<figure>
			<?= '<img class="profile-img mx-auto recorte" id="preview_image" src="' . PROF_IMG . $ua->profilePic . '">';?>
		</figure>
	</div>
	<div class="columns is-flex is-justify-content-center">
		<h2 class="subtitle">¡Bienvenido <?= $ua->username ?>!</h2>
	</div>
</div>
<?php
require_once LAYOUTS_AD . 'footer.php';
closeFooter();
