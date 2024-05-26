const objetiveInfo = document.getElementById("objetive-info");
if (objetiveInfo) {
  document.addEventListener("DOMContentLoaded", function () {
    const $section = document.getElementById("privacyId");
    const content = document.getElementById("body-content");

    objetiveInfo.addEventListener("click", (e) => {
      e.preventDefault();
      $section.innerHTML = `
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
      `;
      const textArea = document.querySelector("textarea");

      textArea.addEventListener("focus", function () {
        if (this.value === "Write a Comment...") {
          this.value = "";
        }
      });
      textArea.addEventListener("blur", function () {
        if (this.value === "") {
          this.value = "Write a Comment...";
        }
      });

      const closeM = document.getElementById("close");
      const modal = document.getElementById("image-modal");
      const capa = document.getElementById("capa");
      document.body.appendChild($section);
      content.classList.remove("overflow-hidden");
      content.classList.add("overflow-hidden");
      closeM.addEventListener("click", () => {
        console.log("clicked");
        modal.classList.add("hidden");
        capa.classList.toggle("hidden");
        content.classList.remove("overflow-hidden");
        content.classList.add("overflow-auto");
      });

      const closeM2 = document.getElementById("close-modal");
      document.body.appendChild($section);
      content.classList.remove("overflow-hidden");
      content.classList.add("overflow-hidden");
      closeM2.addEventListener("click", () => {
        console.log("clicked");
        modal.classList.add("hidden");
        capa.classList.toggle("hidden");
        content.classList.remove("overflow-hidden");
        content.classList.add("overflow-auto");
      });
    });
  });
}
