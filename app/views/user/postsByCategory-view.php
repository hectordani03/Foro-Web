<?php
require_once LAYOUTS_US . 'header.php';
?>

<!-- MODALS --------------------------------------------------------------------->

<!-- COMMENT MODAL -->
<div id="commentsId" class="absolute z-50 flex justify-center w-full mx-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
</div>
<!-- SHARE MODAL -->
<div id="shareId" class="absolute z-50 flex justify-center w-full mx-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
</div>

<!-- --------------------------------------------------------------------------- -->

<section id="content" class="w-full relative md:left-24 md:w-10/12">

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
    <main class="flex mt-20 z-30 flex-col lg:flex-row">
        <?php
        require_once USER_VIEWS . 'add-post.php';
        ?>

        <!-- OBJETIVE CARD -->
        <a id="objetive-info" class=" mr-3 w-full mx-auto lg:w-2/12 order-first lg:order-last" href="#"><img class="rounded-lg w-64 h-56 mx-auto lg:mb-0 mb-10" src="<?php echo GIFT; ?>obj2.gif" alt=""></a>

    </main>

    <div class="flex flex-col xl:flex-row transition-all">
        <div class="xl:flex xl:items-start"></div>
    <!-- SEARCHER -->
        <?php include USER_VIEWS . 'searcher.php'; ?>

    <!-- PUBLICATIONS SECTION -->
    <section class="posts-section grid grid-cols-1 lg:grid-cols-2 md:ml-20 mt-16 xl:w-9/12 w-11/12 mx-auto gap-8 md:mr-10 lg:mr-5" id="posts">
        <!-- CARD -->
    </section>
</div>


</section>

<?php
require_once LAYOUTS_US . 'footer.php';
setFooter($d, "post", "comment")
?>
<script>
    $(function() {
        app.catPosts();
        app.categories();
        app.getHashtags();
        post.addPosts();
        post.sharePost();
        comment.comment();
    });
</script>