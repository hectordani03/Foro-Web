$(document).ready(function () {
  var modal = document.getElementById("myModal");
  var btn = document.getElementById("openModalBtn");
  var span = document.getElementsByClassName("close")[0];
  var saveBtn = document.getElementById("saveBtn");
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
