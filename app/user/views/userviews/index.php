<!-- MODALS --------------------------------------------------------------------->

<!-- COMMENT MODAL -->
<div id="modalId" class="absolute z-10 flex justify-center w-full mx-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
</div>
<!-- SHARE MODAL -->
<div id="shareId" class="absolute z-10 flex justify-center w-full mx-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
</div>

<!-- --------------------------------------------------------------------------- -->



<section id="content" class="w-11/12 relative left-24">

    <!-- HEADER -->
    <header class="flex justify-between items-center">
        <h1 class="text-black flex justify-center w-full text-4xl font-bold mt-5 dark:text-white">FOR <span class="text-blue-500 ml-2">US</span></h1>

        <?php if (!empty($_SESSION['role'])) { ?>
            <a href="<?php echo APP_URL; ?>user/profile">
                <img class="w-11 h-10 bg-blue-500 rounded-full mr-10 mt-5" src="<?php echo APP_URL; ?>assets/profile_picture/<?php echo $_SESSION['photo']; ?>" alt="">
            </a>
        <?php } ?>
    </header>


    <!-- MAIN -->
    <main class="flex justify-between items-start mt-20 z-30">

        <!-- INITIAL CARD -->

        <?php
        require './views/userViews/add-post.php';
        ?>

        <!-- OBJETIVE CARD -->
        <a class=" mr-5 w-2/12" href="#"><img class="rounded-lg w-64 h-56 mx-auto" src="<?php echo APP_URL; ?>assets/gifs/obj2.gif" alt=""></a>

    </main>

    <div class="flex">
        <!-- PUBLICATIONS SECTION -->
        <section class="grid grid-cols-2 ml-20 mt-16 w-9/12 gap-8">
            <!-- CARD -->

            <?php
            require './views/userViews/card.php';
            ?>

        </section>

        <!-- SEARCHER -->

        <?php
        include './views/userViews/searcher.php';
        ?>

    </div>

</section>