<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For-Us</title>
</head>

<?php
    include './app/views/inc/cabeceraUser.php';
?>
<body id="body-content" class="flex"> 
    
    <!-- MODALS --------------------------------------------------------------------->

    <!-- COMMENT MODAL -->
    <div id="modalId" class="absolute z-10 flex justify-center w-full mx-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    </div>
    <!-- SHARE MODAL -->
    <div id="shareId" class="absolute z-10 flex justify-center w-full mx-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    </div>

    <!-- --------------------------------------------------------------------------- -->



    <section id="content" class="w-11/12 relative left-28">

        <!-- HEADER -->
        <header class="flex justify-between items-center">
            <h1 class="text-black flex justify-center w-full text-4xl font-bold mt-5 dark:text-white">FOR <span class="text-blue-500 ml-2">US</span></h1>
            <a href="profile">
                <img class="w-11 h-10 bg-blue-500 rounded-full mr-10 mt-5" src="./assets/person-1.jpg" alt="">
            </a>
        </header>
    

        <!-- MAIN -->
        <main class="flex justify-between items-center mt-20 z-30">

            <!-- INITIAL CARD -->

            <?php
                include './app/views/userViews/add-post.php';
            ?>

            <!-- OBJETIVE CARD -->
            <a class=" mr-5 w-2/12" href="#"><img class="rounded-lg w-64 h-56 mx-auto" src="./assets/gifs/obj2.gif" alt=""></a>

        </main>

        <div class="flex">
            <!-- PUBLICATIONS SECTION -->
            <section class="grid grid-cols-2 ml-20 mt-16 w-9/12 gap-8">
                <!-- CARD -->
                
                <?php
                    include './app/views/userViews/card.php';
                ?>
                  
        </section>

        <!-- SEARCHER -->

        <?php
            include './app/views/userViews/searcher.php';
        ?>
          
    </div>
        
    </section>

    <script src="./js/card-menu.js"></script>
    <script src="./js/card-comment.js"></script>
    <script src="./js/card-share.js"></script>
</body>

</html>