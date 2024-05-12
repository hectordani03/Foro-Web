<?php
require_once LAYOUTS_US . 'header.php';
?>

<!-- MODALS --------------------------------------------------------------------->

<!-- COMMENT MODAL -->
<div id="commentsId" class="absolute z-10 flex justify-center w-full mx-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
</div>
<!-- SHARE MODAL -->
<div id="shareId" class="absolute z-10 flex justify-center w-full mx-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
</div>

<!-- --------------------------------------------------------------------------- -->

<section id="content" class="w-11/12 relative left-24">

    <!-- HEADER -->
    <header class="flex justify-between items-center">
        <h1 class="text-black flex justify-center w-full text-4xl font-bold mt-5 dark:text-white">FOR <span class="text-blue-500 ml-2">US</span></h1>

        <?php if (isset($ua->sv) && $ua->sv) { ?>
            <a href="/profile">
                <img class="w-11 h-10 bg-blue-500 rounded-full mr-10 mt-5" src="<?php echo PROF_IMG;echo $ua->profilePic; ?>" alt="">
            </a>
        <?php } ?>

    </header>

    <!-- MAIN -->
    <main class="flex justify-between items-start mt-20 z-30">

        <!-- INITIAL CARD -->

        <?php
        require_once USER_VIEWS . 'add-post.php';
        ?>

        <!-- OBJETIVE CARD -->
        <a id="objetive-info" class=" mr-5 w-2/12" href="#"><img class="rounded-lg w-64 h-56 mx-auto" src="<?php echo GIFT; ?>obj2.gif" alt=""></a>

    </main>

    <div class="flex">
        <!-- PUBLICATIONS SECTION -->
        <section class="grid grid-cols-2 ml-20 mt-16 w-9/12 gap-8" id="posts">
            <!-- CARD -->

        </section>


        <!-- SEARCHER -->
        <?php
        require_once USER_VIEWS . 'searcher.php';
        ?>
    </div>

</section>

<?php
require_once LAYOUTS_US . 'footer.php';
?>