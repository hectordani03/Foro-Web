<div class="bg-gray-100 dark:bg-slate-700 shadow-lg w-full rounded-xl flex flex-col relative mt-5 h-fit self-start opacity-100">
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
                    <a class="text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center" href="">#NoMoreHunger</a>
                    <a class="text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center" href="">#EndIt</a>
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


                    <div id="share-button" class="text-gray-400 w-8 h-8 absolute right-3 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path class="fill-current" d="M307 34.8c-11.5 5.1-19 16.6-19 29.2v64H176C78.8 128 0 206.8 0 304C0 417.3 81.5 467.9 100.2 478.1c2.5 1.4 5.3 1.9 8.1 1.9c10.9 0 19.7-8.9 19.7-19.7c0-7.5-4.3-14.4-9.8-19.5C108.8 431.9 96 414.4 96 384c0-53 43-96 96-96h96v64c0 12.6 7.4 24.1 19 29.2s25 3 34.4-5.4l160-144c6.7-6.1 10.6-14.7 10.6-23.8s-3.8-17.7-10.6-23.8l-160-144c-9.4-8.5-22.9-10.6-34.4-5.4z"/></svg>
                    </div>
                </div>
            </div>