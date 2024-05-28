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
    <?php
    require_once LAYOUTS_AD . 'navbar.php';