var modal = document.getElementById("myModal");
if (modal) {
  $(document).ready(function () {
    var btn = document.getElementById("openModalBtn");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function () {
      modal.style.display = "block";
    };
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
  });
}

var modald = document.getElementById("datamodal");
if (modald) {
  $(document).ready(function () {
    var span = document.getElementsByClassName("closed")[0];
    span.onclick = function () {
      modald.style.display = "none";
    };
    window.onclick = function (event) {
      if (event.target == modald) {
        modald.style.animation = "growShrinkModal 0.5s";
        setTimeout(function () {
          modald.style.animation = "";
        }, 500);
      }
    };
  });
}
