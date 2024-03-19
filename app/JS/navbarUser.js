const desplegable = document.getElementById("desplegable"),
  navHeader = document.getElementById("nav-header"),
  capa3 = document.getElementById("capa3"),
  nav = document.getElementById("nav"),
  desplegableText = document.querySelectorAll(".desplegableText");
icon = document.getElementById("icons");
(forusText = document.getElementById("forus")),
  (body = document.querySelector("body"));

desplegable.addEventListener("click", (e) => {
  navHeader.classList.toggle("w-2/12");
  capa3.classList.toggle("hidden");
  nav.classList.toggle("items-center");
  nav.classList.toggle("items-start");
  nav.classList.toggle("ml-3");
  // desplegableText.classList.toggle("hidden")
  desplegableText.forEach((text) => {
    text.classList.toggle("hidden");
  });
  body.classList.toggle("overflow-hidden");
});

capa3.addEventListener("click", (e) => {
  navHeader.classList.toggle("w-3/12");
  capa3.classList.toggle("hidden");
  nav.classList.toggle("items-center");
  nav.classList.toggle("items-start");
  nav.classList.toggle("ml-3");
  desplegableText.forEach((text) => {
    text.classList.toggle("hidden");
  });
});

// DARK MODE

// const enlaces = document.querySelectorAll("a");
// enlaces.forEach( enlace =>{
//     enlace.addEventListener("click", e =>{
//         e.preventDefault()
//     })
// })
document
  .getElementById("dark-mode-icon")
  .addEventListener("click", function () {
    console.log("click");
    const htmlClasses = document.querySelector("html").classList;
    if (localStorage.getItem("theme") === "dark") {
      htmlClasses.remove("dark");
      localStorage.removeItem("theme");
      console.log("Dark mode removed");
    } else {
      htmlClasses.add("dark");
      localStorage.setItem("theme", "dark");
      console.log("Dark mode added");
    }
  });

// Verificar el estado de localStorage al cargar la página
window.addEventListener("DOMContentLoaded", function () {
  console.log("DOMContentLoaded");
  const htmlClasses = document.querySelector("html").classList;
  if (localStorage.getItem("theme") === "dark") {
    htmlClasses.add("dark");
    console.log("Dark mode applied on page load");
  } else {
    htmlClasses.remove("dark");
    console.log("Light mode applied on page load");
  }
});

let scrollPosition = 0;

function storeScrollPosition() {
  scrollPosition = window.scrollY;
}

document
  .getElementById("nav-header")
  .addEventListener("mouseenter", function () {
    window.scrollTo(0, scrollPosition);
  });
