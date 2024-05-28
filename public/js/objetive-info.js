const objetiveInfo = document.getElementById("objetive-info");
if (objetiveInfo) {
  document.addEventListener("DOMContentLoaded", function () {
    const $section = document.getElementById("informationCategoryId");
    const content = document.getElementById("body-content");

    objetiveInfo.addEventListener("click", (e) => {
      e.preventDefault();
      $section.innerHTML = `
        <div id="image-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white dark:bg-slate-700 p-6 rounded-lg relative w-11/12 md:w-9/12 xl:w-8/12 h-5/6 overflow-auto">
            <button id="close" type="button" class="close-modal ms-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-notification" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
                <h1 class="text-black flex justify-center w-full text-3xl font-bold dark:text-white">FOR <span class="text-blue-500 ml-2">US</span></h1>
                
                <!-- Contenedor de la imagen principal -->
                <div class="w-full mt-4 mb-2 rounded-xl overflow-hidden bg-center" style="max-height: 20rem;">
                <img src="http://forus.com/resources/assets/img/post/zero-hunger.jpg" alt="Large Image" class="w-auto h-auto max-w-full max-h-full">
            </div>
            

                <!-- Contenedor dividido en dos partes -->
                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0">
                    <!-- Contenedor de texto a la izquierda -->
                    <div class="w-10/12 p-4">
                      <h1 class="text-black flex justify-center w-full text-3xl font-bold dark:text-white text-center mb-5">ZERO <span class="text-blue-500 ml-2">HUNGER</span></h1>
                      <p class=" text-black dark:text-white text-justify mb-5 text-lg font-normal"> The Zero Hunger objective aims to completely eliminate hunger and malnutrition globally by 2030. It seeks to ensure everyone has access to sufficient, safe, and nutritious food, especially vulnerable groups. The goal also focuses on doubling agricultural productivity for small-scale farmers through equal access to resources, knowledge, and markets. It promotes sustainable and resilient food production systems that maintain ecosystems and can adapt to climate change impacts. Additionally, Zero Hunger emphasizes preserving genetic diversity of crops and livestock while ensuring fair benefit-sharing from genetic resources. Achieving this ambitious goal requires collaborative multi-stakeholder efforts tackling the root causes of hunger through poverty reduction, improved resource access, and sustainable solutions.
                      </p>
                    </div>

                    <!-- Contenedor de imagen y texto a la derecha -->
                    <div class="w-auto p-4 flex flex-col items-center relative top-14">
                        <img class="w-40 h-40 rounded-xl" src="http://forus.com/resources/assets/img/categories/gifs/E_GIF_02.gif" alt="Half Image" class="rounded-lg max-w-full h-auto mt-2">
                        <div class="hashtag text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center h-fit cursor-pointer relative mt-5" href="">
                          <span class="z-10">Zero Hunger</span>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      `;

      document.querySelector("body").classList.add("overflow-hidden");
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