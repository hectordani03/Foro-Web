function alerts(alert) {
  const defaults = {
    position: "center",
    showConfirmButton: false,
    timer: 1200,
    allowOutsideClick: false,
  };

  if (alert.type == "success") {
    Swal.fire({
      icon: "success",
      text: alert.text,
      ...defaults,
      willClose: () => {
        location.reload();
      },
    });
  } else if (alert.type == "error") {
    Swal.fire({
      icon: "error",
      text: alert.text,
      ...defaults,
      willClose: () => {
        location.reload();
      },
    });
  } else if (alert.type == "function") {
    Swal.fire({
      icon: alert.icon,
      text: alert.text,
      ...defaults,
      willClose: () => {
        alert.callback();
      },
    });
  }else if (alert.type == "normal") {
    Swal.fire({
      icon: alert.icon,
      text: alert.text,
      ...defaults,
    });
  }
}

/*----------------------------- ALERTS-------------------------------------- */
$(function () {
  $(".nologued").on("click", function (event) {
    event.preventDefault();
    Swal.fire({
      icon: "error",
      title: "Login / Register",
      text: "Login or register to continue viewing the page without interruptions",
      confirmButtonColor: "#28a745",
      confirmButtonText:
        '<a class="botoniniciar text-light text-decoration-none" href="/login">Login / Register</a>',
      showCancelButton: false,
      backdrop: true,
      timer: 1000,
    });
  });
});

$(function () {
  $(".requestForm").on("submit", function (e) {
    e.preventDefault();

    const $form = $(this);

    Swal.fire({
      title: "Sure?",
      text: "Do you want to perform the requested action?",
      icon: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, do",
      cancelButtonText: "No, cancel",
    }).then((result) => {
      if (result.isConfirmed) {
        let data = new FormData(this);
        let method = $form.attr("method");
        let action = $form.attr("action");
        let headers = new Headers();

        let config = {
          method: method,
          headers: headers,
          mode: "cors",
          cache: "no-cache",
          body: data,
        };
        fetch(action, config)
          .then((res) => res.json())
          .then((res) => {
            alerts(res);
          });
      }
    });
  });
});

$(function () {
  let $btn_logout = $("#btn_logout");
  if ($btn_logout.length) {
    $btn_logout.on("click", function (e) {
      e.preventDefault();
      Swal.fire({
        title: "Do you want to log out?",
        text: "The current session will be closed and you will log out",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, exit",
        cancelButtonText: "Cancel",
      }).then((result) => {
        if (result.isConfirmed) {
          let url = $btn_logout.attr("href");
          window.location.href = url;
        }
      });
    });
  }
});
