<?php
function setHeader($args, ...$links)
{
	$ua = as_object($args->ua);

?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= $args->title ?></title>
		<link rel="icon" href="<?= LOGO; ?>logo.png">


		<?php foreach ($links as $link) { ?>
			<link rel="stylesheet" href="<?= CSS; ?><?= $link ?>">
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