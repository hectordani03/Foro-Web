const auth = {

  routes: {
    login: "/login",
    register: "/Register/register",
    session: "/Login/login",
  },

  login: function () {
    const loginForm = $("#login-form");
    const p1 = $("#password");
    loginForm.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      const data = new FormData(this);
      fetch(auth.routes.session, {
        method: "POST",
        body: data,
      }).then((res) => res.json())
        .then((res) => {
          if (res.r === true) {
            location.href = "/";
          } else if (res.r === "s") {
            Swal.fire({
              position: "center",
              showConfirmButton: false,
              timer: 1000,
              icon: "error",
              text: "Your account is suspended, please try again later",
            }).then(function () {
              location.reload();
            });
          } else {
            Swal.fire({
              position: "center",
              icon: "error",
              title: "Incorrect fields",
              showConfirmButton: false,
              timer: 1000,
            }).then(() => {
              p1.trigger("focus");
            });
          }
        });
    });
  },

  register: function () {
    const rf = $("#register-form");
    rf.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      rf.find('button[type="submit"]').prop('disabled', true);
      let p1 = $("#password");
      let p2 = $("#password2");
      if (p1.val() !== p2.val()) {
        Swal.fire({
          icon: "error",
          text: "Passwords dont match",
        }).then(() => {
          p2.val("");
          p2.trigger("focus");
          e.preventDefault();
          rf.find('button[type="submit"]').prop('disabled', false);
        });
      } else {
        const data = new FormData(this);
        fetch(auth.routes.register, {
          method: "POST",
          body: data,
        }).then((res) => res.json())
          .then((res) => {
            if (res.r === true) {
              location.href = auth.routes.login;
            } else if (res.r === 'r') {
              Swal.fire({
                position: "center",
                showConfirmButton: false,
                timer: 2000,
                icon: "error",
                text: "The EMAIL you just entered is already registered in the system, please check and try again",
              }).then(() => {
                rf[0].reset();
                rf.find('button[type="submit"]').prop('disabled', false);
              });
            } else {
              Swal.fire({
                position: "center",
                showConfirmButton: false,
                timer: 1000,
                icon: "error",
                text: "Unexpected error, please try again",
              }).then(() => {
                rf[0].reset();
                rf.find('button[type="submit"]').prop('disabled', false);
              });
            }
          }).catch((err) => {
            Swal.fire({
              position: "center",
              showConfirmButton: false,
              timer: 1000,
              icon: "error",
              text: "Unexpected error, please try again",
            }).then(() => {
              rf[0].reset();
              rf.find('button[type="submit"]').prop('disabled', false);
            });
          });
      }
    });
  },
};
