const editProfile = document.getElementById("edit-profile");
if (editProfile) {
  document.addEventListener("DOMContentLoaded", function () {
    const $section = document.getElementById("profileModalId");
    const content = document.getElementById("body-content");

    editProfile.addEventListener("click", (e) => {
      $section.innerHTML = `
      <div id="capa" class="fixed inset-0 bg-gray-500 bg-opacity-40 transition-opacity"></div>
      <section id="modal" class="bg-gray-100 dark:bg-slate-700 rounded-xl w-8/12 2xl:w-8/12 mx-auto relative mt-10 h-fit">
          <header class="flex">
              <h1 class="text-black flex justify-start w-full text-2xl font-bold mt-5 ml-5 dark:text-white">FOR <span class="text-blue-500 ml-2">US</span></h1>
              <div id="close" class="text-gray-400 w-8 h-8 transition-all cursor-pointer mt-5 mr-5">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                      <path class="fill-current" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                  </svg>
              </div>
          </header>
          <section class="flex">
              <form class="requestForm ml-10 mt-10 w-6/12" action="http://localhost/For-Us/app/user/requestControllers/users/userRequest.php" method="POST" autocomplete="off" enctype="multipart/form-data">
  
                  <h1 class="text-black flex justify-start w-full text-2xl font-bold mt-5 mb-5 ml-5 text-center dark:text-white">Upload your <span class="text-blue-500 ml-2">information</span></h1>
  
                  <input type="hidden" name="user_module" value="updateUser">
                  <input type="hidden" name="id_user" value="${currentUser.id}">
  
                  <section class="flex gap-5">
                      <input name="username" type="text" placeholder="New Username" class="border-b-2 border-t-1 border-gray-300 py-3 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-inherit bg-slate-200 dark:bg-slate-600 rounded-2 xl px-5 text-gray-400 font-semibold w-5/12 shadow-md rounded-xl" pattern="[a-zA-Z0-9]{4,20}" maxlength="40" value="${currentUser.username}" required />
  
                      <input name="email" type="email" placeholder="New Email" class="border-b-2 border-t-1 border-gray-300 py-3 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-inherit bg-slate-200 dark:bg-slate-600 rounded-2 xl px-5 text-gray-400 font-semibold w-5/12 shadow-md rounded-xl" value="${currentUser.email}" required />
                  </section>
  
                  <section class="flex gap-5">
                      <input name="age" type="text" placeholder="Age" class="border-b-2 border-t-1 border-gray-300 py-3 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-inherit bg-slate-200 dark:bg-slate-600 rounded-2 xl px-5 text-gray-400 font-semibold w-5/12 mt-5 shadow-md rounded-xl" value="${currentUser.age}" />
  
                      <input name="nacionality" type="text" placeholder="Nacionality" class="border-b-2 border-t-1 border-gray-300 py-3 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-inherit bg-slate-200 dark:bg-slate-600 rounded-2 xl px-5 text-gray-400 font-semibold w-5/12 mt-5 shadow-md rounded-xl" value="${currentUser.nacionality}" />
                  </section>
                  
  
                  <textarea name="description" placeholder="Description" class="relative rounded-lg px-6 py-2 text-lg text-gray-400 bg-slate-200 dark:bg-slate-600 w-10/12 resize-none outline-none font-semibold mt-10 shadow-md mb-10" rows="7" maxlength="380">${currentUser.description}</textarea>
  
                  <button type="submit" class="flex justify-center bg-sky-400 text-white font-3xl text-center w-3/12 mx-auto px-20 py-3 rounded-lg font-semibold mb-5">Upload</button>
              </form>
              <section class="w-6/12 flex flex-col items-center mt-10">
  
                  <h1 class="text-black flex justify-center w-full text-2xl font-bold mt-5 ml-5 mb-5 dark:text-white">Upload your profile<span class="text-blue-500 ml-2">image</span></h1>
  
                  <form class="requestForm h-auto w-10/12" action="http://localhost/For-Us/app/user/requestControllers/users/userRequest.php" method="POST" autocomplete="off" enctype="multipart/form-data">
  
                      <input type="hidden" name="user_module" value="updatePhoto">
                      <input type="hidden" name="id_user" value="${currentUser.id}">
                      
                      <label for="input-file" id="drop-area" class="mt-5 mb-5 w-9/12">
                          <div id="img-view" class="p-2 rounded-md text-center mt-3 mb-3">
                      <div class="w-8/12 shadow-lg mx-auto h-fit rounded-xl bg-slate-200 dark:bg-slate-600 py-5">
                          <div class="border-2 border-dashed border-blue-500 w-7/12 mx-auto text-center flex flex-col justify-center items-center rounded-xl h-40 hover:border-gray-400 transition-colors">
                                      <input type="file" id="input-file" name="user_profile_photo" accept=".jpg, .png, .jpeg" hidden>
                                      <svg class="w-20 h-20 mt-5 mx-auto cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                          <path class="fill-blue-500 hover:fill-gray-400 transition-colors" class="fill-current" d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z" />
                                      </svg>
  
                                      <h1 class="text-black flex justify-center w-full text-xs font-bold mt-1 dark:text-white">Drag File Here To Upload</h1>
  
                                      <h2 class="text-blue-500 flex justify-center w-full font-bold mb-10" style="font-size: 10px;">Max File Size 5mb</h2>
                                      </div>
                                      </div>
                                      </div>
                                  </label>
                      <button type="submit" class="flex justify-center bg-sky-400 text-white font-3xl text-center w-3/12 mx-auto px-20 py-3 rounded-lg font-semibold mb-5 mt-5">Upload</button>
  
                  </form>
  
                  <div class="w-7/12 mt-5">
                      <h1 class="text-black flex justify-center w-full text-2xl font-bold mt-5 dark:text-white">Choose your<span class="text-blue-500 ml-2">Color</span></h1>
  
                      <div class="w-12/12 relative h-28 2xl:h-32 shadow-xl mt-5 rounded-xl flex mb-10 ">
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
  
                  </div>
              </section>
  
          </section>
  
      </section>
`;
const forms_ajax = document.querySelectorAll(".requestForm");

forms_ajax.forEach((form) => {
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    Swal.fire({
      title: "Sure?",
      text: "Do you want to perform the requested action?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, do",
      cancelButtonText: "No, cancel",
    }).then((re) => {
      if (re.isConfirmed) {
        let data = new FormData(this);
        let method = this.getAttribute("method");
        let action = this.getAttribute("action");

        let headers = new Headers();

        let config = {
          method: method,
          headers: headers,
          mode: "cors",
          cache: "no-cache",
          body: data,
        };

        fetch(action, config)
          .then((res) => res.json())
          .then((res) => {
            ajax_alerts(res);
            closeModal();
          });
      }
    });
  });
});
      const dropArea = document.getElementById("drop-area");
      const inputFile = document.getElementById("input-file");
      const imgView = document.getElementById("img-view");
      inputFile.addEventListener("change", uploadImage);

      function uploadImage() {
        let imgLink = URL.createObjectURL(inputFile.files[0]);
        imgView.style.backgroundImage = `url(${imgLink})`;
        imgView.textContent = "";
        imgView.style.border = 0;
      }

      dropArea.addEventListener("dragover", function (e) {
        e.preventDefault();
      });
      dropArea.addEventListener("drop", function (e) {
        e.preventDefault();
        inputFile.files = e.dataTransfer.files;
        uploadImage();
      });

      dropArea.addEventListener("click", function () {
        inputFile.value = null;
        imgView.style.backgroundImage = "none";
      });

      const closeM = document.getElementById("close");
      const modal = document.getElementById("modal");
      const capa = document.getElementById("capa");
      document.body.appendChild($section);
      content.classList.remove("overflow-hidden");
      content.classList.add("overflow-hidden");
      closeM.addEventListener("click", () => {
        modal.classList.add("hidden");
        capa.classList.toggle("hidden");
        content.classList.remove("overflow-hidden");
        content.classList.add("overflow-auto");
      });

      const background = document.getElementById("background");
      const backgroundClasses = background.classList;
      const red = document.getElementById("red");
      const green = document.getElementById("green");
      const blue = document.getElementById("blue");
      const yellow = document.getElementById("yellow");
      const purple = document.getElementById("purple");
      const fuchsia = document.getElementById("fuchsia");
      const orange = document.getElementById("orange");
      const gray = document.getElementById("gray");
      const black = document.getElementById("black");
      const white = document.getElementById("white");

      // Función para guardar el color en localStorage
function saveColorToLocalStorage(color) {
  localStorage.setItem('selectedColor', color);
}

// Función para cargar el color desde localStorage
function loadColorFromLocalStorage() {
  const savedColor = localStorage.getItem('selectedColor');
  if (savedColor) {
    backgroundClasses.replace(backgroundClasses.item(1), savedColor);
  }
}

// Llama a la función para cargar el color al cargar la página
loadColorFromLocalStorage();

// Función para cambiar el color de fondo y guardar en localStorage
function changeBackgroundColor(colorClass) {
  backgroundClasses.replace(backgroundClasses.item(1), colorClass);
  saveColorToLocalStorage(colorClass); // Guardar el color seleccionado
}

red.addEventListener("click", () => changeBackgroundColor("from-red-400"));
green.addEventListener("click", () => changeBackgroundColor("from-green-400"));
blue.addEventListener("click", () => changeBackgroundColor("from-sky-400"));
yellow.addEventListener("click", () => changeBackgroundColor("from-yellow-400"));
purple.addEventListener("click", () => changeBackgroundColor("from-purple-400"));
fuchsia.addEventListener("click", () => changeBackgroundColor("from-fuchsia-400"));
orange.addEventListener("click", () => changeBackgroundColor("from-orange-400"));
gray.addEventListener("click", () => changeBackgroundColor("from-gray-400"));
black.addEventListener("click", () => changeBackgroundColor("from-black"));
white.addEventListener("click", () => changeBackgroundColor("from-gray-100"));

// También podemos escuchar el evento "DOMContentLoaded" para asegurarnos de que 
// la carga de la página también dispare la función para cargar el color desde localStorage
document.addEventListener("DOMContentLoaded", loadColorFromLocalStorage);

    });
  });
}
