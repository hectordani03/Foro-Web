document.addEventListener("DOMContentLoaded", function() {
    // Obtener el elemento del menú por su ID
    const menuCard = document.getElementById('menu-card');
    const customModal = document.getElementById('custom-modal');
    const content = document.getElementById('content');
    const capa1 = document.getElementById('capa1');

    // Variable para mantener el estado del modal
    let modalVisible = false;

    // Agregar un evento de clic al elemento del menú
    menuCard.addEventListener('click', function() {
        // Si el modal está visible, ocultarlo
        if (modalVisible) {
            customModal.style.display = 'none';
            capa1.classList.add("hidden");
            modalVisible = false;
        } else {
            // Contenido del modal
            const modalContent = '<div class="rounded-3xl flex flex-col justify-center items-center gap-5 h-fit self-start w-10/12 shadow-lg bg-gray-100 ml-10 opacity-100">' +
                '<div class="flex mt-10">' +
                '<div class="text-gray-400 w-7 h-7 cursor-pointer mb-2">' +
                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path class="fill-current" d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"/></svg>' +
                '</div>' +
                '<p class="text-gray-400 font-semibold ml-5 text-xl mt-1">Guardar Publicacion</p>' +
                '</div>' +
                '<hr class="w-full border-t-2">' +
                '<div class="flex mt-2">' +
                '<div class="text-gray-400 w-10 h-10 cursor-pointer">' +
                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path class="fill-current" d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"/></svg>' +
                '</div>' +
                '<p class="text-gray-400 font-semibold ml-5 text-xl">Ocultar Publicacion</p>' +
                '</div>' +
                '<hr class="w-full border-t-2">' +
                '<div class="flex mb-5">' +
                '<div class="text-gray-400 w-9 h-9 cursor-pointer ml-2 mb-2">' +
                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path class="fill-current" d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>' +
                '</div>' +
                '<p class="text-gray-400 font-semibold ml-5 text-xl mt-1">Reportar Publicacion</p>' +
                '</div>' +
                '<hr>' +
                '</div>';

            // Colocar el contenido del modal dentro del div #custom-modal
            customModal.innerHTML = modalContent;

            // Mostrar el modal
            customModal.style.display = 'flex';

            capa1.classList.remove("hidden");
            modalVisible = true;
        }
    });

    // Ocultar el modal cuando se hace clic fuera de él
    customModal.addEventListener('click', function(event) {
        if (event.target === customModal) {
            customModal.style.display = 'none';
            capa1.classList.add("hidden");
            modalVisible = false;
        }
    });
});
