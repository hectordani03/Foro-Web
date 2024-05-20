

<?php
require_once LAYOUTS_US . 'header.php';
?>
<link rel="stylesheet" href="">
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
        <a id="objetive-info" class="mr-5 w-2/12 cursor-pointer" href="#">
        <img class="rounded-lg w-64 h-56 mx-auto" src="<?php echo GIFT; ?>obj2.gif" alt="">
        </a>
        
         <!-- Modal cuando das click en la categoria -->
        <div id="image-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
            <div class="bg-slate-700 p-6 rounded-lg relative w-10/12 md:w-8/12 lg:w-8/12">
                <button id="close-modal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <h1 class="text-black flex justify-center w-full text-2xl font-bold dark:text-white">FOR <span class="text-blue-500 ml-2">US</span></h1>
                
                <!-- Contenedor de la imagen principal -->
                <div class="w-full mt-4 mb-2">
                    <img src="<?php echo OBJ_IMG; ?>zero hunger.png" alt="Large Image" class="p-4 rounded-lg max-w-full h-auto max-h-64 bg-auto">
                </div>

                <!-- Contenedor dividido en dos partes -->
                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0">
                    <!-- Contenedor de texto a la izquierda -->
                    <div class="w-10/12 p-4">
                        <h1 class="text-white text-center mb-5 text-2xl font-bold">
                            Zero Hunger <!-- AQUI VA EL CAMPO QUE LLENO EL USUARIO LLAMADO "NAME OF CATEGORY" -->
                        </h1>
                        <p class="text-white text-justify mb-5"> <!-- AQUI VA EL CAMPO QUE LLENO EL USUARIO LLAMADO "DESCRIPTION" -->
                            Aqui va la descripcion que puso el usuario bla bla bla Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo recusandae maxime deserunt, debitis quas optio iusto adipisci, amet veritatis asperiores sunt! Veniam asperiores quos sunt optio voluptas, neque culpa at Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus quod consequatur molestias harum unde soluta architecto, saepe eaque ipsam illum deleniti fugit placeat illo quidem, itaque animi provident! Quam, laudantium. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa molestias alias voluptate y su puta madre aja si sigue leyendo putita.
                    </div>

                    <!-- Contenedor de imagen y texto a la derecha -->
                    <div class="w-auto p-4 flex flex-col items-center">
                        <img src="<?php echo LOGIN_IMG; ?>obj2.png" alt="Half Image" class="rounded-lg max-w-full h-auto mt-2">
                        <p class="text-white text-justify mt-2 max-w-36"> <!-- AQUI VA EL CAMPO QUE LLENO EL USUARIO LLAMADO "TOPIC" -->
                            Aqui va el campo "Topic" que ingresó el usuario
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- JavaScript -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const imageLink = document.getElementById('objetive-info');
                const modal = document.getElementById('image-modal');
                const closeModalButtons = document.querySelectorAll('#close-modal, #close-modal-bottom');

                imageLink.addEventListener('click', function (event) {
                    event.preventDefault(); // Previene la acción por defecto del enlace
                    modal.classList.remove('hidden');
                });

                closeModalButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        modal.classList.add('hidden');
                    });
                });
            });
        </script>
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