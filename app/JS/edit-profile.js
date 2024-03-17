document.addEventListener('DOMContentLoaded', function() {

    const editProfile = document.getElementById('edit-profile');
    const $section = document.getElementById('profileModalId');
    const content = document.getElementById('body-content');

    editProfile.addEventListener('click', e => {
        $section.innerHTML = `
        <div id="capa" class="fixed inset-0 bg-gray-500 bg-opacity-30 transition-opacity"></div>
        <section id="modal" class="bg-gray-100 dark:bg-slate-700 rounded-xl w-6/12 mx-auto relative mt-32">
        <header class="flex">
            <h1 class="text-black flex justify-start w-full text-2xl font-bold mt-5 ml-5 dark:text-white">FOR <span class="text-blue-500 ml-2">US</span></h1>
            <div id="close" class="text-gray-400 w-8 h-8 transition-all cursor-pointer mt-5 mr-5">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path class="fill-current" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/>
                </svg>
            </div>
        </header>
        <section class="flex">

            <form action="#" class="flex flex-col w-6/12 relative mt-24 ml-10">
            <h1 class="text-black flex justify-start w-full text-2xl font-bold mt-5 mb-5 ml-5 text-center dark:text-white">Upload your <span class="text-blue-500 ml-2">information</span></h1>
                <section class="flex gap-5">
                    <input
                    id="input_id"
                    name="input"
                    type="text"
                    value="Age"
                    class="border-b-2 border-t-1 border-gray-300 py-3 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-inherit bg-slate-200 dark:bg-slate-600 rounded-2 xl px-5 text-gray-400 font-semibold w-5/12 shadow-md rounded-xl"
                    />
                    
                    
                    <input
                    id="input_id"
                    name="input"
                    type="text"
                    value="Nacionality"
                    class="border-b-2 border-t-1 border-gray-300 py-3 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-inherit bg-slate-200 dark:bg-slate-600 rounded-2 xl px-5 text-gray-400 font-semibold w-5/12 shadow-md rounded-xl"
                    />  
                </section>
                <input
                id="input_id"
                name="input"
                type="text"
                value="Role"
                class="border-b-2 border-t-1 border-gray-300 py-3 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-inherit bg-slate-200 dark:bg-slate-600 rounded-2 xl px-5 text-gray-400 font-semibold w-5/12 mt-5 shadow-md rounded-xl"
                />               
                <textarea class="relative rounded-lg px-6 py-2 text-lg text-gray-400 bg-slate-200 dark:bg-slate-600 w-10/12 resize-none outline-none font-semibold mt-10 shadow-md mb-10" rows="7" maxlength="380">Description</textarea>
            </form>
            <section class="w-6/12 flex flex-col items-center mt-10">
            <h1 class="text-black flex justify-center w-full text-2xl font-bold mt-5 ml-5 mb-5 dark:text-white">Upload your profile<span class="text-blue-500 ml-2">image</span></h1>

                <div class="w-6/12 shadow-lg mx-auto h-fit rounded-xl bg-slate-200 dark:bg-slate-600">
                    <div class="border-2 border-dashed border-blue-500 w-10/12 mx-auto text-center flex flex-col justify-center items-center rounded-xl mb-5 mt-5">
                        <svg class="w-20 h-20 mt-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path fill="#3b82f6" d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"/></svg>
                        <h1 class="text-black flex justify-center w-full text-xs font-bold mt-1 dark:text-white">Drag File Here To Upload</h1>
                    <h2 class="text-blue-500 flex justify-center w-full font-bold mb-10" style="font-size: 10px;">Max File Size 5mb</h2>
                </div>
            </div>
            <div class="w-7/12 mt-5">
                <h1 class="text-black flex justify-center w-full text-2xl font-bold mt-5 dark:text-white">Choose your<span class="text-blue-500 ml-2">Color</span></h1>

                <div class="w-12/12 relative h-32 shadow-xl mt-5 rounded-xl flex mb-10 ">
                    <div id="red" class="relative bg-red-500 w-4/12 h-full rounded-l-lg hover:scale-110">
                        
                    </div>
                    <div id="green" class="relative bg-green-400 w-4/12 h-full hover:scale-110">
                        
                    </div>
                    <div id="blue" class="relative bg-sky-500 w-4/12 h-full hover:scale-110">
                        
                    </div>
                    <div id="yellow" class="relative bg-yellow-300 w-4/12 h-full hover:scale-110">
                        
                    </div>
                    <div id="purple" class="relative bg-purple-500 w-4/12 h-full hover:scale-110">
                        
                    </div>
                    <div id="fuchsia" class="relative bg-fuchsia-400 w-4/12 h-full hover:scale-110">
                        
                    </div>
                    <div id="orange" class="relative bg-orange-400 w-4/12 h-full hover:scale-110">
                        
                    </div>
                    <div id="gray" class="relative bg-gray-300 w-4/12 h-full hover:scale-110">
                        
                    </div>
                    <div id="black" class="relative bg-black w-4/12 h-full hover:scale-110">
                        
                    </div>
                    <div id="white" class="relative bg-white w-4/12 h-full rounded-r-lg hover:scale-110">
                        
                    </div>
                    
                    
                </div>
                <button class="flex justify-center bg-sky-400 text-white font-3xl text-center w-3/12 mx-auto px-20 py-3 rounded-lg font-semibold mb-5">Upload</button>
            </div>
        </section>

        </section>
            
        </section>
`

            const closeM = document.getElementById('close');
            const modal = document.getElementById('modal');
            const capa = document.getElementById('capa');
            document.body.appendChild($section);
            content.classList.remove('overflow-hidden');
            content.classList.add("overflow-hidden")
            closeM.addEventListener('click', () => {
                modal.classList.add('hidden');
                capa.classList.toggle('hidden');
                content.classList.remove("overflow-hidden")
                content.classList.add("overflow-auto")
            });

            // BACKGROUND COLOR

            const background = document.getElementById('background');
            const backgroundClasses = background.classList;
            const red = document.getElementById('red');
            const green = document.getElementById('green');
            const blue = document.getElementById('blue');
            const yellow = document.getElementById('yellow');
            const purple = document.getElementById('purple');
            const fuchsia = document.getElementById('fuchsia');
            const orange = document.getElementById('orange');
            const gray = document.getElementById('gray');
            const black = document.getElementById('black');
            const white = document.getElementById('white');

            red.addEventListener("click", e =>{
                if(backgroundClasses.length >= 2) {
                    backgroundClasses.replace(backgroundClasses.item(1), "from-red-400")
                }
            })

            green.addEventListener("click", e =>{
                if(backgroundClasses.length >= 2) {
                    backgroundClasses.replace(backgroundClasses.item(1), "from-green-400")
                }
            })

            blue.addEventListener("click", e =>{
                if(backgroundClasses.length >= 2) {
                    backgroundClasses.replace(backgroundClasses.item(1), "from-sky-400")
                }
            })

            yellow.addEventListener("click", e =>{
                if(backgroundClasses.length >= 2) {
                    backgroundClasses.replace(backgroundClasses.item(1), "from-yellow-400")
                }
            })

            purple.addEventListener("click", e =>{
                if(backgroundClasses.length >= 2) {
                    backgroundClasses.replace(backgroundClasses.item(1), "from-purple-400")
                }
            })

            fuchsia.addEventListener("click", e =>{
                if(backgroundClasses.length >= 2) {
                    backgroundClasses.replace(backgroundClasses.item(1), "from-fuchsia-400")
                }
            })

            orange.addEventListener("click", e =>{
                if(backgroundClasses.length >= 2) {
                    backgroundClasses.replace(backgroundClasses.item(1), "from-orange-400")
                }
            })

            gray.addEventListener("click", e =>{
                if(backgroundClasses.length >= 2) {
                    backgroundClasses.replace(backgroundClasses.item(1), "from-gray-400")
                }
            })

            black.addEventListener("click", e =>{
                if(backgroundClasses.length >= 2) {
                    backgroundClasses.replace(backgroundClasses.item(1), "from-black")
                }
            })

            white.addEventListener("click", e =>{
                if(backgroundClasses.length >= 2) {
                    backgroundClasses.replace(backgroundClasses.item(1), "from-gray-100")
                }
            })
    })
})