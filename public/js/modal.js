function manejarModal(modalId, closeButtonClass, abrirModalFunction = null) {
  var modal = document.getElementById(modalId);
  if (modal) {
    $(document).ready(function () {
      var span = document.querySelector(closeButtonClass);
      span.onclick = function () {
        modal.style.display = "none";
      };
      window.onclick = function (event) {
        if (event.target == modal) {
          modal.style.animation = "growShrinkModal 0.5s";
          setTimeout(function () {
            modal.style.animation = "";
          }, 500);
        }
      };

      if (abrirModalFunction) {
        abrirModalFunction(modal);
      }
    });
  }
}

function abrirModal(btn, modal) {
  btn.onclick = function () {
    modal.style.display = "block";
  };
}

manejarModal(
  "myModal",
  ".close",
  abrirModal.bind(null, document.getElementById("openModalBtn"))
);
manejarModal("datamodal", ".closed");
manejarModal("deletemodal", ".closedd");
