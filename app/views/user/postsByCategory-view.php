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

<!-- NOTIFICATIONS MODAL -->
<div id="notificationsId" class="absolute z-50 flex justify-center w-full mx-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
</div>

<!-- INFORMATION CATEGORY MODAL -->
<div id="informationCategoryId" class="absolute z-50 flex justify-center w-full mx-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
</div>

<!-- --------------------------------------------------------------------------- -->

<section id="content" class="w-full relative md:w-full">

    <!-- HEADER -->
    <header class="flex justify-between items-center sticky top-0 z-30 bg-white dark:bg-slate-800 pb-4">
        <h1 class="text-black flex justify-center w-full text-4xl font-bold mt-5 dark:text-white">FOR <span class="text-blue-500 ml-2">US</span></h1>

        <?php if (isset($ua->sv) && $ua->sv) { ?>

            <div class="flex gap-5">
                <div id="bell-icon" class="text-gray-400 w-9 h-9 mx-auto cursor-pointer mt-6 relative" onclick="app.notifications()">
                    <svg id="bell-active" fill="#9ca3af" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56 56">
                        <path class="fill-current" d="M 9.4257 43.2461 L 46.5742 43.2461 C 48.8005 43.2461 50.1133 42.0977 50.1133 40.4102 C 50.1133 38.0664 47.7460 35.9570 45.7070 33.8711 C 44.1601 32.2539 43.7382 28.9258 43.5742 26.2305 C 43.3867 17.2305 41.0195 11.0195 34.7617 8.7695 C 33.8945 5.7226 31.4570 3.2852 28.0117 3.2852 C 24.5429 3.2852 22.1289 5.7226 21.2382 8.7695 C 15.0039 11.0195 12.6132 17.2305 12.4492 26.2305 C 12.2617 28.9258 11.8632 32.2539 10.2929 33.8711 C 8.2773 35.9570 5.8867 38.0664 5.8867 40.4102 C 5.8867 42.0977 7.2226 43.2461 9.4257 43.2461 Z M 20.8632 46.4336 C 21.1445 49.8555 24.0273 52.7148 28.0117 52.7148 C 31.9726 52.7148 34.8554 49.8555 35.1601 46.4336 Z"></path>
                    </svg>
                    <div id="userNotifications" class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900"></div>
                </div>

                <a href="/profile">
                    <img class="w-11 h-10 bg-blue-500 rounded-full mr-10 mt-5" src="<?= PROF_IMG;echo $ua->profilePic; ?>" alt="">
                </a>
            </div>
        <?php } ?>

    </header>
    <!-- MAIN -->
    <main class="flex mt-20 z-30 flex-col lg:flex-row">
        <?php
        require_once USER_VIEWS . 'add-post.php';
        ?>

        <!-- OBJETIVE CARD -->
        <a id="objetiveInfo" class="mr-10 w-10/12 mx-auto lg:w-2/12 order-first lg:order-last" href="#"><img id="objetiveGif" class="rounded-lg w-64 h-56 mx-auto lg:mb-0 mb-10" src="" alt=""></a>

    </main>

    <div class="flex flex-col xl:flex-row transition-all relative md:left-24 w-full md:w-11/12 xl:w-11/12">
        <div class="xl:flex xl:items-start"></div>
        <!-- SEARCHER -->
        <?php include USER_VIEWS . 'searcher.php'; ?>

        <!-- PUBLICATIONS SECTION -->
        <section class="posts-section grid grid-cols-1 lg:grid-cols-2 md:ml-20 mt-16 xl:w-9/12 w-11/12 mx-auto gap-8 lg:mr-5 ml-10 sm:ml-16" id="posts">
            <!-- CARD -->
        </section>
    </div>


</section>

<?php
require_once LAYOUTS_US . 'footer.php';
?>
<script>
    $(function() {
        app.catPosts();
        app.getHashtags();
        post.addPosts();
        window.onload = loadDoc;
    });

    document.addEventListener("DOMContentLoaded", e => {
        const $header = document.querySelector("header");

        window.addEventListener("scroll", e => {
            window.pageYOffset > 10 ? $header.classList.add("shadow-2xl") : $header.classList.remove("shadow-2xl")
        })
    })
</script>