<?php
setHeader($d, "admin", "sweetalert2.min", "jquery.DT.min");
$ua = $d->ua;

?>
	<!-- SEARCHER AND PROFILE -->
	<header class="w-full flex justify-end pr-20 mt-5 mb-5">
        <div class="rounded-full bg-sky-500 h-fit p-4"></div>
        <p class="ml-5"><?= $ua->username ?></p>
	</header>
    <?php
    require_once LAYOUTS_AD . 'navbar.php';
    ?>