    <div id="capa" class="fixed inset-0 bg-gray-500 bg-opacity-30 dark:bg-opacity-40 transition-opacity"></div>

    <section id="modal" class="bg-gray-100 dark:bg-slate-700 rounded-xl w-7/12 mx-auto h-screen flex flex-col fixed">

        <div class="flex justify-between fixed w-7/12 z-50 bg-gray-100 dark:bg-slate-700 shadow-lg pb-4">
            <h1 class="text-black flex text-2xl font-bold mt-5 ml-5 dark:text-white">FOR <span class="text-blue-500 ml-2">US</span></h1>
            <p class="font-bold text-xl mt-5 dark:text-white">${username}'s Post</p>
            <div id="close" class="text-gray-400 w-8 h-8 transition-all cursor-pointer mt-5 mr-5">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path class="fill-current" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                </svg>
            </div>
        </div>
        <hr class="w-full mt-5">

        <div id="card-scrollbar" class="overflow-y-auto z-40 h-auto relative mt-6">
            <div class="bg-gray-100 dark:bg-slate-700 w-10/12 rounded-xl flex flex-col relative mt-5 h-fit self-start opacity-100 mx-auto">
                <div id="capa" class="bg-gray-500 opacity-30 w-full h-full absolute hidden rounded-xl transition ease-in z-50"></div>
                <div id="custom-modal" class="absolute w-full h-full flex flex-col justify-center items-center opacity-100 transition ease-in">
                    <!-- Contenido del modal -->
                </div>
                <!-- TOP CARD CONTENT -->
                <div class="flex mt-5 ml-5">
                    <img class="w-12 h-11 bg-blue-500 rounded-full top-8 left-8" src="../assets/profile_picture/${profile_picture}" alt="">
                    <div class="flex flex-col ml-5">
                        <h2 class="text-xl text-gray-400 font-semibold">${username}</h2>
                        <p class="text-gray-400">${time}</p>
                    </div>
                    <!-- CARD MENU -->
                    <div class="absolute right-5 top-0">
                        <span id="menu-card" class="text-5xl text-gray-400 cursor-pointer select-none">...</span>
                    </div>
                </div>

                <!-- CARD CONTENT -->
                <p class="text-gray-400 w-10/12 mx-auto text-xl mt-8">${content}</p>

                <!-- <a class="text-blue-500 underline text-xl w-10/12 mx-auto mt-2 mb-1" href="https://google.com">Naciones Unidas</a> -->
                <img class="w-10/12 mx-auto rounded-xl mt-7" src="${img}" alt="">

                <!-- CARD HASHTAGS -->
                <div class="flex gap-4 w-10/12 mx-auto mt-5">
                    <a class="text-white font-bold bg-gray-400 rounded-full px-4 py-1 text-center" href="">#${category}</a>
                </div>


            </div>
            <hr class="w-full mt-5 border dark:border-slate-600">

            <div id="comments">
                
            </div>


        </div>

        <hr class="w-full mt-5">

        <section class="fixed bottom-0 bg-gray-100 dark:bg-slate-700 w-7/12 shadow-inner z-50">
            <div class="w-11/12 mx-auto flex mt-5 mb-5">
                <img class="w-12 h-11 bg-blue-500 rounded-full top-8 left-8" src="<?= PROF_IMG; ?><?=$ua->profilePic?>" alt="">
                <div class="bg-gray-200 ml-5 rounded-xl shadow-lg w-10/12">
                    <!-- Reemplaza el párrafo con el input -->
                    <!-- <input type="text" class="px-5 mt-2 text-gray-600 w-full focus:outline-none bg-gray-200" placeholder="Write a comment..." style="white-space: pre-wrap;"> -->
                    <textarea class="relative rounded-lg text-lg text-gray-400 bg-gray-200 dark:bg-slate-600 w-full resize-none outline-none font-medium pl-5" rows="" maxlength="380"></textarea>
                </div>
                <!-- Cambia el botón por uno de enviar -->
                <button class="text-gray-400 w-10 h-10 transition-all cursor-pointer ml-5 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path class="fill-current" d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480V396.4c0-4 1.5-7.8 4.2-10.7L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3.3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z" />
                    </svg>
                </button>
            </div>
        </section>

    </section>
