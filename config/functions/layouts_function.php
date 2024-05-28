<?php
function setHeader($args, ...$links)
{
	if(isset($args->ua)){
	$ua = as_object($args->ua);
	}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= $args->title ?></title>
		<link rel="icon" href="<?= LOGO; ?>logo.png">
		<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
		<script src="https://cdn.tailwindcss.com"></script>
	
		<link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome" href="/css/app-wa-d53d10572a0e0d37cb8d614a3f177a0c.css?vsn=d"  >
		<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
		<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css">
		<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
		<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css">
		<link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css">

		<?php foreach ($links as $link) { ?>
			<link rel="stylesheet" href="<?= CSS; ?><?= $link ?>.css">
		<?php } ?>


	</head>

	<body>
	<?php
}

function setFooter($args, ...$scripts)
{
	?>
		<?php foreach ($scripts as $script) { ?>
			<script src="<?= JS; ?><?= $script ?>.js"></script>
		<?php }
		
	}

	function closeFooter()
	{ ?>

	</body>

	</html>

<?php
	}

?>