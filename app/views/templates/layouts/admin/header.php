<?php
setHeader($d, "admin", "sweetalert2.min", "jquery.DT.min");
$ua = $d->ua;

?>
<link href="https://cdn.jsdelivr.net/gh/eliyantosarage/font-awesome-pro@main/fontawesome-pro-6.5.2-web/css/all.min.css" rel="stylesheet">
		<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/locales/de_DE.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/geodata/germanyLow.js"></script>
		<script src="https://cdn.amcharts.com/lib/5/fonts/notosans-sc.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
	<!-- SEARCHER AND PROFILE -->
	<header class="w-full flex justify-end pr-20 mt-5 mb-5">
		<img class="rounded-full w-10 h-10" src="<?=PROF_IMG?><?=$ua->profilePic?>" alt="">
        <p class="ml-5 mt-2"><?= $ua->username ?></p>
	</header>
    <?php
    require_once LAYOUTS_AD . 'navbar.php';