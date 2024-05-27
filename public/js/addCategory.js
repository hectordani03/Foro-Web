const addCategory = document.getElementById("addCategory");
if (addCategory) {
  const $section = document.getElementById("privacyId");
  const content = document.getElementById("body-content");

  addCategory.addEventListener("click", (e) => {
    e.preventDefault();
    $section.innerHTML = `
    <div class="fixed inset-0 bg-gray-500 bg-opacity-40 transition-opacity hidden"></div>
    <div id="image-modal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75">
        <div class="bg-slate-700 rounded-lg p-6 max-w-4xl w-full">
            <!-- Header -->
            <div class="relative flex justify-center items-center mb-4">
                <h1 class="text-black text-3xl font-bold dark:text-white">FOR<span class="text-blue-500 ml-2">US</span></h1>
                <button id="close-modal" class="absolute right-0 text-gray-600 hover:text-gray-800 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Content -->
            <div class="flex">
                <!-- Left Side -->
                <div class="w-1/2 pr-2 flex flex-col">
                    <div class="mb-5 mt-9">
                        <input class="text-xl border-b-2 border-gray-300 py-2 focus:border-gray-400 transition-colors focus:outline-none bg-slate-200 dark:bg-slate-600 text-gray-400 font-semibold shadow-md rounded-xl w-full px-2" type="text" id="nombre" placeholder="Name of category">
                    </div>
                    <div class="mb-5">
                        <input class="text-xl border-b-2 border-gray-300 py-2 focus:border-gray-400 transition-colors focus:outline-none bg-slate-200 dark:bg-slate-600 text-gray-400 font-semibold shadow-md rounded-xl w-full px-2" type="text" id="tema" placeholder="Topic">
                    </div>
                    <div class="mb-5">
                        <textarea class="auto-expand text-xl border-b-2 border-gray-300 py-2 focus:border-gray-400 transition-colors focus:outline-none bg-slate-200 dark:bg-slate-600 text-gray-400 font-semibold shadow-md rounded-xl w-full px-2 h-[220px] max-h-[220px] overflow-y-auto" id="descripcion" placeholder="Description"></textarea>
                    </div>
                    
                    
                </div>
                <!-- Right Side -->
                <div class="w-1/2 pl-2 flex flex-col justify-between">
                    <div class="mb-3">
                        <h2 class="text-black text-xl font-bold dark:text-white text-center">Add a category <span class="text-blue-500">Image</span></h2>
                        <label for="profilePic" id="drop-area" class="mt-2 mb-2 w-full">
                            <div id="img-view" class="p-2 rounded-md text-center">
                                <div class="shadow-lg mx-20 h-36 rounded-xl bg-slate-200 dark:bg-slate-600 py-3">
                                    <div class="mt-2 border-2 border-dashed border-blue-500 w-3/4 mx-auto text-center flex flex-col justify-center items-center rounded-xl h-24 hover:border-gray-400 transition-colors">
                                        <input type="file" id="profilePic" name="profilePic" accept=".jpg, .png, .jpeg" hidden>
                                        <svg class="w-16 h-16 mt-2 mx-auto cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                            <path class="fill-blue-500 hover:fill-gray-400 transition-colors" d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"/>
                                        </svg>
                                        <h1 class="text-black text-xs font-bold mt-1 dark:text-white">Drag File Here To Upload</h1>
                                        <h2 class="text-blue-500 font-bold mb-2 text-xs">Max File Size 5mb</h2>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="mb-3">
                        <h2 class="text-black text-xl font-bold dark:text-white text-center">Add a background <span class="text-blue-500">Image</span></h2>
                        <label for="profilePic" id="drop-area" class="mt-2 mb-2 w-full">
                            <div id="img-view" class="p-2 rounded-md text-center">
                                <div class="shadow-lg mx-auto h-36 rounded-xl bg-slate-200 dark:bg-slate-600 py-3">
                                    <div class="mt-3 border-2 border-dashed border-blue-500 w-3/4 mx-auto text-center flex flex-col justify-center items-center rounded-xl h-24 hover:border-gray-400 transition-colors">
                                        <input type="file" id="profilePic" name="profilePic" accept=".jpg, .png, .jpeg" hidden>
                                        <svg class="w-16 h-16 mt-2 mx-auto cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                            <path class="fill-blue-500 hover:fill-gray-400 transition-colors" d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"/>
                                        </svg>
                                        <h1 class="text-black text-xs font-bold mt-1 dark:text-white">Drag File Here To Upload</h1>
                                        <h2 class="text-blue-500 font-bold mb-2 text-xs">Max File Size 5mb</h2>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <!-- Footer -->
                    <div class="flex justify-center mb-5 mt-2">  <!-- Revisar el onclick -->
                        <button type="submit" onclick="profile.updateUser()" id="updatebtn" class="text-xl bg-sky-400 text-white text-center w-1/2 py-2 rounded-lg font-semibold">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    `;
    
    const modal = document.getElementById("image-modal");
    modal.classList.remove("hidden");

    const closeModalButton = document.getElementById("close-modal");
    closeModalButton.addEventListener("click", () => {
      modal.classList.add("hidden");
      content.classList.remove("overflow-hidden");
      content.classList.add("overflow-auto");
    });

    content.classList.add("overflow-hidden");
  });
}
