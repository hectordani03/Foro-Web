const auth = {
  routes: {
    login: "/login",
    register: "/Register/register",
    session: "/Login/login",
  },

  login: function () {
    const lf = $("#login-form");
    const p1 = $("#password");
    lf.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      const data = new FormData(this);
      fetch(auth.routes.session, {
        method: "POST",
        body: data,
      })
        .then((res) => res.json())
        .then((res) => {
          if (res.r === true) {
            location.href = "/";
          } else if (res.r === "e") {
            alerts({
              type: "function",
              icon: "error",
              text: "Filds can not be empty",
              callback: function () {
                lf[0].reset();
              },
            });
          } else if (res.r === "d") {
            alerts({
              type: "function",
              icon: "error",
              text: "Invalid credentials",
              callback: function () {
                lf[0].reset();
              },
            });
          }else if (res.r === "s") {
            alerts({
              type: "error",
              text: "Your account is suspended, please try again later",
            });
          } else if (res.r === "q") {
            alerts({
              type: "error",
              text: "Unexpected error, please try again",
            });
          }
        })
        .catch(() => {
          alerts({
            type: "error",
            text: "Unexpected error, please try again",
          });
        });
    });
  },

  register: function () {
    const rf = $("#register-form");
    rf.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      rf.find('button[type="submit"]').prop("disabled", true);
      let p1 = $("#password");
      let p2 = $("#password2");
      if (p1.val() !== p2.val()) {
        alerts({
          type: "function",
          icon: "error",
          text: "Passwords dont match",
          callback: function () {
            p2.val("");
            p2.trigger("focus");
            e.preventDefault();
            rf.find('button[type="submit"]').prop("disabled", false);
          },
        });
      } else {
        const data = new FormData(this);
        fetch(auth.routes.register, {
          method: "POST",
          body: data,
        })
          .then((res) => res.json())
          .then((res) => {
            if (res.r === true) {
              location.href = auth.routes.login;
            } else if (res.r === "r") {
              alerts({
                type: "function",
                icon: "error",
                text: "The EMAIL you just entered is already registered in the system, please check and try again",
                callback: function () {
                  rf[0].reset();
                  rf.find('button[type="submit"]').prop("disabled", false);
                },
              });
            } else if (res.r === "e") {
              alerts({
                type: "function",
                icon: "error",
                text: "Filds can not be empty",
                callback: function () {
                  rf[0].reset();
                  rf.find('button[type="submit"]').prop("disabled", false);
                },
              });
            } else if (res.r === "q") {
              alerts({
                type: "error",
                text: "Unexpected error, please try again",
              });
            }
          })
          .catch(() => {
            alerts({
              type: "error",
              text: "Unexpected error, please try again",
            });
          });
      }
    });
  },
};
