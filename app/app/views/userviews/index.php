<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"> -->
</head>

<?php
    // Incluir la cabecera
    include './app/views/inc/cabeceraUser.php';
?>
<body id="body-content" class="flex">
    <!-- NAV -->

    
    
    <!-- MODALS --------------------------------------------------------------------->
    <!-- COMMENT MODAL -->
    <div id="modalId" class="absolute z-10 flex justify-center w-full mx-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    </div>



    <section id="content" class="w-11/12 relative left-28">

        <!-- HEADER -->
        <header class="flex justify-between items-center">
            <h1 class="text-black flex justify-center w-full text-4xl font-bold mt-5">FOR <span class="text-blue-500 ml-2">US</span></h1>
            <a href="profile">
                <img class="w-11 h-10 bg-blue-500 rounded-full mr-10 mt-5" src="./assets/person-1.jpg" alt="">
            </a>
        </header>
    

        <!-- MAIN -->
        <main class="flex justify-between items-center mt-20 z-30">

            <!-- INITIAL CARD -->
            <div id="initial-card" class="bg-gray-100 shadow-lg ml-20 mr-10 w-9/12 h-52 flex justify-start items-start relative rounded-xl">
                <img class="w-12 h-11 bg-blue-500 rounded-full absolute top-8 left-8" src="./assets/person-1.jpg" alt="">
                <textarea class="relative rounded-lg px-6 py-2 top-7 left-20 text-2xl text-gray-400 bg-gray-100 w-10/12 resize-none outline-none -h-28 font-semibold" rows="5" maxlength="380">What's in your mind?</textarea>

                <div class="flex absolute bottom-3 left-8 gap-2">
                    <a class="text-white font-bold bg-gray-400 rounded-full px-4 py-1 text-center" href="">#NoMoreHunger</a>
                    <a class="text-white font-bold bg-gray-400 rounded-full px-4 py-1 text-center" href="">#EndIt</a><a class="text-white font-bold bg-gray-400 rounded-full px-4 py-1 text-center" href="">#Justice</a>
                </div>
                <script>
                    const card = document.getElementById('initial-card')
                    const textArea = document.querySelector('textarea')
                    const maxlength = 250;

                    textArea.addEventListener('input', () => {
                        const value = textArea.value.length
                        if ( value > maxlength) {
                            card.classList.remove('h-52')
                            card.classList.add('h-64')
                            card.classList.add('transtion-all')
                        } else{
                            card.classList.remove('h-64')
                            card.classList.add('h-52')
                        }
                    })

                    textArea.addEventListener("focus", function () {
                        if (this.value === "What's in your mind?") {
                            this.value = "";
                        }
                    });
                    textArea.addEventListener('blur', function () {
                        if (this.value === '') {
                            this.value = "What's in your mind?";
                        }
                    });

                </script>
                <div class="flex absolute bottom-3 right-5 gap-2">
                    <div class="text-gray-400 w-8 h-8 pt-1 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path class="fill-current" d="M160 32c-35.3 0-64 28.7-64 64V320c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H160zM396 138.7l96 144c4.9 7.4 5.4 16.8 1.2 24.6S480.9 320 472 320H328 280 200c-9.2 0-17.6-5.3-21.6-13.6s-2.9-18.2 2.9-25.4l64-80c4.6-5.7 11.4-9 18.7-9s14.2 3.3 18.7 9l17.3 21.6 56-84C360.5 132 368 128 376 128s15.5 4 20 10.7zM192 128a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM48 120c0-13.3-10.7-24-24-24S0 106.7 0 120V344c0 75.1 60.9 136 136 136H456c13.3 0 24-10.7 24-24s-10.7-24-24-24H136c-48.6 0-88-39.4-88-88V120z"/></svg>
                    </div>
                    <div class="text-gray-400 w-8 h-8 mr-3 pt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path class="fill-current" d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z"/></svg>
                    </div>
                    <a class="text-white font-semibold bg-blue-400 rounded-full px-7 py-1 text-center" href="">Share</a>
                </div>
            </div>

            <!-- OBJETIVE CARD -->
            <a class=" mr-5 w-2/12" href="#"><img class="rounded-lg w-64 h-56 mx-auto" src="./assets/gifs/obj2.gif" alt=""></a>

        </main>

        <div class="flex">
            <!-- PUBLICATIONS SECTION -->
            <section class="grid grid-cols-2 ml-20 mt-16 w-9/12 gap-8">
                
                <!-- PROTOTIPO DE CARD -  RETIRAR DEL CODIGO Y USAR EN PHP PARA COMPONETIZAR -->
                <!-- CARD -->
                
                <div class="bg-gray-100 shadow-lg w-full rounded-xl flex flex-col relative mt-5 h-fit self-start opacity-100">
                    <div id="capa1" class="bg-gray-500 opacity-30 w-full h-full absolute hidden rounded-xl transition ease-in"></div>
                    <div id="custom-modal" class="absolute w-full h-full flex flex-col justify-center items-center opacity-100 transition ease-in">
                    <!-- Contenido del modal -->
                </div>
                <!-- TOP CARD CONTENT -->
                <div class="flex mt-5 ml-5">
                    <img class="w-12 h-11 bg-blue-500 rounded-full top-8 left-8" src="./assets/person-1.jpg" alt="">
                    <div class="flex flex-col ml-5">
                        <h2 class="text-xl text-gray-400 font-semibold">Jose Joshua</h2>
                        <p class="text-gray-400">08:04 p.m</p>
                    </div>
                    <!-- CARD MENU -->
                    <div class="absolute right-5 top-0">
                        <span id="menu-card" class="text-5xl text-gray-400 cursor-pointer select-none">...</span>
                    </div>
                </div>

                <!-- CARD CONTENT -->
                <p class="text-gray-400 w-10/12 mx-auto text-xl mt-8">"I firmly believe that climate action should be a global priority. Protecting our planet for future generations. It's time for all of us to commit to concrete and meaningful actions!"</p>

                <!-- <a class="text-blue-500 underline text-xl w-10/12 mx-auto mt-2 mb-1" href="https://google.com">Naciones Unidas</a> -->
                <img class="w-10/12 mx-auto rounded-xl mt-7" src="./assets/card_img/obj2_img.jpg" alt="">

                <!-- CARD HASHTAGS -->
                <div class="flex gap-4 w-10/12 mx-auto mt-5">
                    <a class="text-white font-bold bg-gray-400 rounded-full px-4 py-1 text-center" href="">#NoMoreHunger</a>
                    <a class="text-white font-bold bg-gray-400 rounded-full px-4 py-1 text-center" href="">#EndIt</a>
                </div>

                <!-- FOOTER CARD -->
                <div class="flex w-10/12 relative mt-10 mb-5 mx-auto">

                    <!-- BUTTONS FOOTER CARD -->
                    <div id="like" class="text-gray-400 w-8 h-8 transition-all cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path class="fill-current" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/>
                        </svg>
                    </div>

                    <script>
                        const like = document.getElementById('like')

                        like.addEventListener('click', () => {
                            like.classList.toggle('text-red-700')
                        })
                    </script>

                    <div id="comment-button" class="text-gray-400 w-7 h-7 ml-5 mt-1 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path class="fill-current" d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64h96v80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416H448c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64z"/>
                        </svg>
                    </div>


                    <div class="text-gray-400 w-8 h-8 absolute right-3 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path class="fill-current" d="M307 34.8c-11.5 5.1-19 16.6-19 29.2v64H176C78.8 128 0 206.8 0 304C0 417.3 81.5 467.9 100.2 478.1c2.5 1.4 5.3 1.9 8.1 1.9c10.9 0 19.7-8.9 19.7-19.7c0-7.5-4.3-14.4-9.8-19.5C108.8 431.9 96 414.4 96 384c0-53 43-96 96-96h96v64c0 12.6 7.4 24.1 19 29.2s25 3 34.4-5.4l160-144c6.7-6.1 10.6-14.7 10.6-23.8s-3.8-17.7-10.6-23.8l-160-144c-9.4-8.5-22.9-10.6-34.4-5.4z"/></svg>
                    </div>
                </div>
            </div>
                  
        </section>

        <!-- SEARCHER -->

        <div class="searcher bg-gray-100 relative w-2/12 mt-20 rounded-xl mx-auto flex justify-center shadow-lg">
            <div class="absolute top-8 w-11/12 2xl:w-full mx-auto flex justify-center">
                <input
                id="input_id"
                name="input"
                type="text"
                class="border-b-2 border-t-1 border-gray-300 py-1 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-inherit bg-gray-200 rounded-full px-5 text-gray-400 font-semibold w-11/12"
                />
                <label
                for="input_id"
                class="absolute left-0 top-1 cursor-text transition-all pl-5 text-gray-400 font-semibold"
                >Search in the Forum</label
                >
            </div>
        </div>

    
  
        

        <script>
            const $input = document.getElementById('input_id')
            const $label = document.querySelector('.searcher label')
            $input.addEventListener('focus', () => {
                $label.classList.add('text-xs')
                $label.classList.add('-top-7')
                $label.classList.add('text-gray-400')
            })

            $input.addEventListener('blur', () => {
                if ($input.value === ''){
                    $label.classList.remove('text-xs')
                    $label.classList.remove('-top-7')
                }
            })
        </script>
        
          
    </div>
        
    </section>

    <!-- <script src="/app/JS/comment-btn.js"></script> -->
    <script src="./js/card-menu.js"></script>
    <script src="./js/card-comment.js"></script>
</body>

</html>