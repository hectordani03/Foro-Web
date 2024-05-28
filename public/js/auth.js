const auth = {
  routes: {
    login: "/login",
    register: "/Register/register",
    session: "/Login/login",
    account: "/Account/getUser",
    verify: "/Account/verifyCode",
    chgPasswd: "/Account/updatePasswd",
  },

  login: function () {
    const lf = $("#login-form");
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
          } else if (res.r === "s") {
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

  account: function () {
    const rf = $("#account-form");
    rf.off("submit").on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      rf.find('button[type="submit"]').prop("disabled", true);
      const data = new FormData(this);
      fetch(auth.routes.account, {
        method: "POST",
        body: data,
      })
        .then((res) => res.json())
        .then((res) => {
          if (res.r === true) {
            alerts({
              type: "function",
              icon: "success",
              text: "Code sent to your email",
              callback: function () {
                location.href = "/verify";
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
          } else if (res.r === "d") {
            alerts({
              type: "function",
              icon: "error",
              text: "Invalid credentials",
              callback: function () {
                rf[0].reset();
                rf.find('button[type="submit"]').prop("disabled", false);
              },
            });
          } else if (res.r === "s") {
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

  verifyCode: function () {
    const vf = $("#verify-form");
    vf.off("submit").on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      vf.find('button[type="submit"]').prop("disabled", true);
      const data = new FormData(this);
      fetch(auth.routes.verify, {
        method: "POST",
        body: data,
      })
        .then((res) => res.json())
        .then((res) => {
          if (res.r === true) {
            alerts({
              type: "function",
              icon: "success",
              text: "Correct Code",
              callback: function () {
                location.href = "/recover";
              },
            });
          } else if (res.r === "d") {
            alerts({
              type: "function",
              icon: "error",
              text: "Code is incorrect, try again",
              callback: function () {
                vf.find('button[type="submit"]').prop("disabled", false);
              },
            });
          } else if (res.r === "n") {
            alerts({
              type: "function",
              icon: "error",
              text: "Code is no longer valid, please try again",
              callback: function () {
                location.href = "/account";
              },
            });
          } else {
            alerts({
              type: "function",
              icon: "error",
              text: "Unexpected error, please try again",
              callback: function () {
                location.href = "/account";
              },
            });
          }
        })
        .catch(() => {
          alerts({
            type: "function",
            icon: "error",
            text: "Unexpected error, please try again",
            callback: function () {
              location.href = "/account";
            },
          });
        });
    });
  },

  chgPasswd: function () {
    const rf = $("#recover-form");
    rf.off("submit").on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      const p1 = $("#password");
      const p2 = $("#password2");
      if (p1.val() !== p2.val()) {
        alerts({
          type: "function",
          icon: "error",
          text: "Passwords dont match",
          callback: function () {
            p2.val("");
            p2.trigger("focus");
            e.preventDefault();
          },
        });
      } else {
      rf.find('button[type="submit"]').prop("disabled", true);
      const data = new FormData(this);
      fetch(auth.routes.chgPasswd, {
        method: "POST",
        body: data,
      })
        .then((res) => res.json())
        .then((res) => {
          if (res.r === true) {
            alerts({
              type: "function",
              icon: "success",
              text: "Password successfully changed",
              callback: function () {
                location.href = "/login";
              },
            });
          } else if (res.r === "e") {
            alerts({
              type: "function",
              icon: "error",
              text: "Filds can not be empty",
              callback: function () {
                rf.find('button[type="submit"]').prop("disabled", false);
              },
            });
          } else if (res.r === "n") {
            alerts({
              type: "function",
              icon: "error",
              text: "Code is no longer valid, please try again",
              callback: function () {
                location.href = "/account";
              },
            });
          } else {
            alerts({
              type: "function",
              icon: "error",
              text: "Unexpected error, please try again",
              callback: function () {
                location.href = "/account";
              },
            });
          }
        })
        .catch(() => {
          alerts({
            type: "function",
            icon: "error",
            text: "Unexpected error, please try again",
            callback: function () {
              location.href = "/account";
            },
          });
        });
      }
    });
  },
};
