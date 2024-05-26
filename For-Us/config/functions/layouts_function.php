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
		<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
		<link href="https://cdn.jsdelivr.net/gh/eliyantosarage/font-awesome-pro@main/fontawesome-pro-6.5.2-web/css/all.min.css" rel="stylesheet">
		<script src="https://cdn.tailwindcss.com"></script>
		<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/locales/de_DE.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/germanyLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/fonts/notosans-sc.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>


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