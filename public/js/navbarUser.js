const desplegable = document.getElementById("desplegable");
const Respdesplegable = document.getElementById("responsive-desplegable");
const navHeader = document.getElementById("nav-header");
const capa3 = document.getElementById("capa3");
const nav = document.getElementById("nav");
const desplegableText = document.querySelectorAll(".desplegableText");
const icon = document.getElementById("icons");
const forusText = document.getElementById("forus");
const body = document.querySelector("body");

if(window.matchMedia('(min-width: 768px)')){
  desplegable.addEventListener("click", (e) => {
    toggleSidebar();
  });

};

Respdesplegable.addEventListener("click", (e) => {
  console.log("click")
  setTimeout(() => {
    toggleSidebar();
    navHeader.classList.toggle("hidden");
  },0);
});

if(window.matchMedia('(max-width: 768px)')){
  desplegable.addEventListener("click", (e) => {
    navHeader.classList.toggle("hidden");
  });
  capa3.addEventListener("click", (e) => {
    navHeader.classList.toggle("hidden");
  });

};

capa3.addEventListener("click", (e) => {
  toggleSidebar();
});

body.addEventListener("click", (e) => {
  if (!nav.contains(e.target) && e.target !== desplegable && e.target !== capa3) {
    closeSidebar();
  }
});

function toggleSidebar() {
  navHeader.classList.toggle("w-2/12");
  capa3.classList.toggle("hidden");
  nav.classList.toggle("items-center");
  nav.classList.toggle("items-start");
  nav.classList.toggle("ml-3");
  desplegableText.forEach((text) => {
    text.classList.toggle("hidden");
  });
  body.classList.toggle("overflow-hidden");
}

function closeSidebar() {
  navHeader.classList.remove("w-2/12");
  capa3.classList.add("hidden");
  nav.classList.remove("items-start");
  nav.classList.add("items-center");
  nav.classList.remove("ml-3");
  desplegableText.forEach((text) => {
    text.classList.add("hidden");
  });
  body.classList.remove("overflow-hidden");
}

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
  const htmlClasses = document.querySelector("html").classList;
  if (localStorage.getItem("theme") === "dark") {
    htmlClasses.add("dark");
  } else {
    htmlClasses.remove("dark");
  }
});

// let scrollPosition = 0;

// function storeScrollPosition() {
//   scrollPosition = window.scrollY;
// }

// document
//   .getElementById("nav-header")
//   .addEventListener("mouseenter", function () {
//     window.scrollTo(0, scrollPosition);
//   });

