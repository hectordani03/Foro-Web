const body = document.querySelector("body"),
  sidebar = body.querySelector(".sidebar"),
  toggle = body.querySelector(".toggle"),
  searchBtn = body.querySelector(".search-box"),
  search = body.querySelector(".search"),
  modeSwitch = body.querySelector(".toggle-switch"),
  modeText = body.querySelector(".mode-text"),
  submenu = body.querySelector(".sub-menu");

let getMode = localStorage.getItem("mode");
if (getMode && getMode === "Dark-Mode") {
  body.classList.add("dark");
}

document.querySelectorAll('.dropdown').forEach(function(dropdown) {
  dropdown.addEventListener('click', function() {
    const currentSubmenu = this.closest('.nav-link').nextElementSibling;
    // Cerrar todos los sub-menús antes de abrir el nuevo
    document.querySelectorAll('.sub-menu').forEach(function(submenu) {
      if (submenu !== currentSubmenu) {
        submenu.classList.remove('open');
      }
    });
    // Abrir o cerrar el sub-menú actual
    if (currentSubmenu) {
      currentSubmenu.classList.toggle('open');
    }
  });
});

toggle.addEventListener("click", () => {
  sidebar.classList.toggle("close");
  body.classList.toggle("side");
  closeAllSubmenus(); // Cierra todos los submenús cuando abres/cierras la barra lateral
});

document.addEventListener('click', function(event) {
  var clicksidebar = sidebar.contains(event.target);
  if (!clicksidebar) {
    sidebar.classList.add("close");
    body.classList.remove("side");
    closeAllSubmenus(); // Cierra todos los submenús cuando haces clic fuera de la barra lateral
  }
});

// Función para cerrar todos los submenús
function closeAllSubmenus() {
  document.querySelectorAll('.sub-menu').forEach(function(submenu) {
    submenu.classList.remove('open');
  });
}

searchBtn.addEventListener("click", () => {
  sidebar.classList.remove("close");
  body.classList.add("side");
  search.focus();
});

document.addEventListener("DOMContentLoaded", function () {
    updateModeText();
  });
  modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");
    updateModeText();
      const mode = body.classList.contains("dark") ? "Dark-Mode" : "Light-Mode";
    localStorage.setItem("mode", mode);
  });
  
  function updateModeText() {
    if (body.classList.contains("dark")) {
      modeText.innerText = "Light Mode";
    } else {
      modeText.innerText = "Dark Mode";
    }
  }
  
