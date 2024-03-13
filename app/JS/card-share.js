document.addEventListener('DOMContentLoaded', function() {

    const commentBtn = document.getElementById('share-button');
    const $section = document.getElementById('shareId');
    const content = document.getElementById('body-content');

    commentBtn.addEventListener('click', e => {
        $section.innerHTML = `
        <!DOCTYPE html>
<html lang="en">
git push origin your-branch-name
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../app/css/styles.css">
    <title>Document</title>

    <style>

        .escalado {
            margin-top: 280px;
            transform: scaleY(.9); /* Ajusta este valor según tus necesidades */
            width: 1300px;
            padding-left: 270px;
            
        }

        .btn {
            background-color: rgb(72, 143, 231);
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }
    
        .btn:hover {
            background-color: rgb(41, 114, 202);
        }

        #card-scrollbar {
            overflow-y: scroll;
        }

        #card-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        #card-scrollbar::-webkit-scrollbar-track {
            background-color: #f3f4f6;
        }

        #card-scrollbar::-webkit-scrollbar-thumb {
            background-color: lightgray;
            border-radius: 6px;
        }
    </style>
</head>

<body>
    <div id="capa" class="fixed inset-0 bg-gray-500 bg-opacity-30 transition-opacity "></div>
    <section class="bg-gray-100 rounded-3xl w-5/12 mx-auto h-auto flex flex-col relative escalado ">
        

        <section id="modal" class="bg-gray-100 rounded-3xl w-5/12 mx-auto h-screen mt-20 -mb-24 flex flex-col fixed">
            <div class="flex justify-between fixed w-5/12 z-50 bg-gray-100  pb-4 overflow-y-auto rounded-3xl">
                <h1 class="text-black flex text-2xl font-bold mt-5 ml-5">FOR <span class="text-blue-500 ml-2">US</span></h1>
                <p class="font-bold text-xl mt-5 centrado">Share Post</p>
                <div id="close" class="text-gray-400 w-8 h-8 transition-all cursor-pointer mt-5 mr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline" viewBox="0 0 512 512">
                        <path class="fill-current" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/>
                    </svg>
                </div>
            </div>
            <hr class="w-full mt-20">

            <div id="card-scrollbar" class="overflow-y-auto z-40 relative">
                <div class="bg-gray-100 w-11/12 rounded-3xl flex flex-col relative  h-fit self-start opacity-100 mx-auto ">
                    <div id="capa" class="bg-gray-500 opacity-30 w-full h-full absolute hidden rounded-3xl transition ease-in z-50"></div>
                    <div id="custom-modal" class="absolute w-full h-full flex flex-col justify-center items-center opacity-100 transition ease-in">
                        <!-- Contenido del modal -->
                    </div>

                    <!-- TOP CARD CONTENT -->
                    <div class="flex mt-5 w-full">
                        <img class="w-12 h-11 bg-blue-500 rounded-full top-8 left-8" src="../app/assets/person-1.jpg" alt="">
                        <div class="flex flex-col ml-5 w-full">
                            <div class="flex items-center w-full">
                                <h2 class="text-xl text-gray-400 font-semibold">Jose Joshua</h2>
                                <svg viewBox="0 0 17.00 17.00" version="1.1" class="svg inline mr-10 h-10 mt-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#292da8" stroke="#292da8" stroke-width="0.00017">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M8.516 0c-4.687 0-8.5 3.813-8.5 8.5s3.813 8.5 8.5 8.5 8.5-3.813 8.5-8.5-3.814-8.5-8.5-8.5zM1.041 9h2.937c0.044 1.024 0.211 2.031 0.513 3h-2.603c-0.481-0.906-0.776-1.923-0.847-3zM3.978 8h-2.937c0.071-1.077 0.366-2.094 0.847-3h2.6c-0.301 0.969-0.467 1.976-0.51 3zM5.547 5h5.896c0.33 0.965 0.522 1.972 0.569 3h-7.034c0.046-1.028 0.239-2.035 0.569-3zM4.978 9h7.035c-0.049 1.028-0.241 2.035-0.572 3h-5.891c-0.331-0.965-0.524-1.972-0.572-3zM13.013 9h2.978c-0.071 1.077-0.366 2.094-0.847 3h-2.644c0.302-0.969 0.469-1.976 0.513-3zM13.013 8c-0.043-1.024-0.209-2.031-0.51-3h2.641c0.48 0.906 0.775 1.923 0.847 3h-2.978zM14.502 4h-2.354c-0.392-0.955-0.916-1.858-1.55-2.7 1.578 0.457 2.938 1.42 3.904 2.7zM9.074 1.028c0.824 0.897 1.484 1.9 1.972 2.972h-5.102c0.487-1.071 1.146-2.073 1.97-2.97 0.199-0.015 0.398-0.030 0.602-0.030 0.188 0 0.373 0.015 0.558 0.028zM6.383 1.313c-0.629 0.838-1.151 1.737-1.54 2.687h-2.314c0.955-1.267 2.297-2.224 3.854-2.687zM2.529 13h2.317c0.391 0.951 0.915 1.851 1.547 2.689-1.561-0.461-2.907-1.419-3.864-2.689zM7.926 15.97c-0.826-0.897-1.488-1.899-1.978-2.97h5.094c-0.49 1.072-1.152 2.075-1.979 2.972-0.181 0.013-0.363 0.028-0.547 0.028-0.2 0-0.395-0.015-0.59-0.030zM10.587 15.703c0.636-0.842 1.164-1.747 1.557-2.703h2.358c-0.968 1.283-2.332 2.247-3.915 2.703z" fill="#4846af"></path>
                                    </g>
                                </svg>
                            </div>

                            <p class="text-gray-400">08:04 p.m</p>
                        </div>
                    </div>

                    <!-- CARD CONTENT -->
                    <textarea class="relative rounded-lg text-lg text-gray-400 bg-gray-100 w-full resize-none outline-none font-medium mt-5 ml-5" rows="" maxlength="380">Write a Comment...</textarea>

                    <hr class="w-full mt-5">
                    
                    <div class="flex mt-5  w-full">
                        <img class="w-12 h-11 bg-blue-500 rounded-full top-8 left-8" src="../app/assets/person-1.jpg" alt="">
                        <div class="flex flex-col ml-5 w-full">
                            <div class="flex items-center w-full">
                                <h2 class="text-xl text-gray-400 font-semibold">Jose Joshua</h2>
                            </div>

                            <p class="text-gray-400">03:45 a.m</p>
                        </div>
                    </div>

                    <p class="text-gray-400 w-12/12 mx-auto text-xl mt-8">"I firmly believe that climate action should be a global priority. Protecting our planet for future generations. It's time for all of us to commit to concrete and meaningful actions!"</p>

                    <img class="w-12/12 mx-auto rounded-xl mt-7" src="../app/assets/card_img/obj2_img.jpg" alt="">

                    <!-- CARD HASHTAGS -->
                    <div class="flex gap-4 w-12/12 mx-auto mt-5">
                        <a class="text-white font-bold bg-gray-400 rounded-full px-4 py-1 text-center" href="">#NoMoreHunger</a>
                        <a class="text-white font-bold bg-gray-400 rounded-full px-4 py-1 text-center" href="">#EndIt</a>
                    </div>
                </div>
            </div>
            <hr class="w-full mt-10 mb-5">
            <button class="btn mr-10 ml-10 mb-5">Share</button>

            <div class="w-10/12 mx-auto reduced-height">
                <!-- Reemplaza el párrafo con el input -->
                <!-- <input type="text" class="px-5 mt-2 text-gray-600 w-full focus:outline-none bg-gray-200" placeholder="Write a comment..." style="white-space: pre-wrap;"> -->

                <script>
                    const textArea = document.querySelector('textarea')

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
            </div>
            <!-- Boton de compartir -->

        </section>
    </section>
</body>

</html>` 

            const closeM = document.getElementById('close');
            const modal = document.getElementById('modal');
            const capa = document.getElementById('capa');
            document.body.appendChild($section);
            content.classList.remove('overflow-hidden');
            content.classList.add("overflow-hidden")
            closeM.addEventListener('click', () => {
                console.log('clicked')
                modal.classList.add('hidden');
                capa.classList.toggle('hidden');
                content.classList.remove("overflow-hidden")
                content.classList.add("overflow-auto")
            });
    })
})