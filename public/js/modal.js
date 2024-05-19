function manejarModales(modalClass, closeButtonClass, abrirModalFunction = null) {
  $(function () {
    $(document).on('click', '.' + closeButtonClass, function() {
      $(this).closest('.' + modalClass).hide();
    });

    $(document).on('click', '.' + modalClass, function(event) {
      if ($(event.target).hasClass(modalClass)) {
        $(event.target).css("animation", "growShrinkModal 0.5s");
        setTimeout(function () {
          $(event.target).css("animation", "");
        }, 500);
      }
    });

    if (abrirModalFunction) {
      abrirModalFunction('.' + modalClass);
    }
  });
}

function abrirModal(btn, modalClass) {
  $(document).on('click', btn, function () {
    $('.' + modalClass).css("display", "block");
  });
}

manejarModales("modal", "close", abrirModal);
