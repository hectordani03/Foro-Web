const app_ad = {
  routes: {
    /* VIEWS */

    /* CONTROLLERS */
    register: "/Register/register",
    deleteUser: "/User/deleteUser",
    reportUser: "/Reports/reportUser",
    reportPost: "/Reports/reportPost",
    reportComt: "/Reports/reportComment",
  },
  registerUser: function () {
    $(function () {
      const rf = $("#register-form");
      rf.on("submit", function (e) {
        e.preventDefault();
        e.stopPropagation();
        let p1 = $("#password");
        let p2 = $("#password2");
        if (p1.val() !== p2.val()) {
          Swal.fire({
            icon: "error",
            text: "Passwords dont match",
          }).then(() => {
            p2.val("");
            p2.trigger("focus");
          });
        } else {
          const data = new FormData(this);
          fetch(app_ad.routes.register, {
            method: "POST",
            body: data,
          })
            .then((res) => res.json())
            .then((res) => {
              if (res.r !== false) {
                Swal.fire({
                  icon: "success",
                  text: "User added successfully",
                }).then(function () {
                  location.reload();
                });
              } else {
                Swal.fire({
                  icon: "error",
                  text: "Unexpected error, please try again",
                }).then(() => {
                  rf[0].reset();
                });
              }
            })
            .catch((err) => {
              Swal.fire({
                icon: "error",
                text: "Unexpected error, please try again",
              }).then(() => {
                rf[0].reset();
              });
            });
        }
      });
    });
  },
  
  deleteUser: function () {
    $(function () {
      const df = $("#delete-form");
      df.on("submit", function (e) {
        e.preventDefault();
        e.stopPropagation();
        let us = $("#dusername");
        let em = $("#demail");
        if (us.val() === "" && em.val() === "") {
          Swal.fire({
            icon: "error",
            text: "Fields can not be empty",
          });
        } else {
          const data = new FormData(this);
          fetch(app_ad.routes.deleteUser, {
            method: "POST",
            body: data,
          })
            .then((res) => res.json())
            .then((res) => {
              if (res.r !== false) {
                Swal.fire({
                  icon: "success",
                  text: "User deleted successfully",
                }).then(function () {
                  location.reload();
                });
              } else {
                Swal.fire({
                  icon: "error",
                  text: "Unexpected error, please try again",
                });
              }
            })
            .catch((err) => {
              Swal.fire({
                icon: "error",
                text: "Unexpected error, please try again",
              });
            });
        }
      });
    });
  },

  reportUser: function () {
    $(function () {
      const repf = $("#reportu-form");
      repf.on("submit", function (e) {
        e.preventDefault();
        e.stopPropagation();
        let us = $("#rusername");
        let em = $("#remail");
        let r = $("#reason");
        let o = $("#other");
        if (us.val() === "" || em.val() === "" || (r.val() === "" || (r.val() === "Other" && o.val() === ""))) {
          Swal.fire({
            icon: "error",
            text: "Fields can not be empty",
          }).then(function(){
            e.preventDefault();
          })
        } else {
          const data = new FormData(this);
          fetch(app_ad.routes.reportUser, {
            method: "POST",
            body: data,
          })
            .then((res) => res.json())
            .then((res) => {
              if (res.r !== false) {
                Swal.fire({
                  icon: "success",
                  text: "User reported successfully",
                }).then(function () {
                  location.reload();
                });
              } else {
                Swal.fire({
                  icon: "error",
                  text: "Unexpected error, please try again",
                });
              }
            })
            .catch((err) => {
              Swal.fire({
                icon: "error",
                text: "Unexpected error, please try again",
              });
            });
        }
      });
    });
  },
  reportPost: function () {
    $(function () {
      const repf = $("#reportp-form");
      repf.on("submit", function (e) {
        e.preventDefault();
        e.stopPropagation();
        let t = $("#text");
        let c = $("#category");
        let r = $("#reason");
        let o = $("#other");
        if (t.val() === "" || c.val() === "" || (r.val() === "" || (r.val() === "Other" && o.val() === ""))) {
          Swal.fire({
            icon: "error",
            text: "Fields can not be empty",
          }).then(function(){
            e.preventDefault();
          })
        } else {
          const data = new FormData(this);
          fetch(app_ad.routes.reportPost, {
            method: "POST",
            body: data,
          })
            .then((res) => res.json())
            .then((res) => {
              if (res.r !== false) {
                Swal.fire({
                  icon: "success",
                  text: "Post reported successfully",
                }).then(function () {
                  location.reload();
                });
              } else {
                Swal.fire({
                  icon: "error",
                  text: "Unexpected error, please try again",
                });
              }
            })
            .catch((err) => {
              Swal.fire({
                icon: "error",
                text: "Unexpected error, please try again",
              });
            });
        }
      });
    });
  },
  
  reportComt: function () {
    $(function () {
      const repf = $("#reportc-form");
      repf.on("submit", function (e) {
        e.preventDefault();
        e.stopPropagation();
        let c = $("#content");
        let r = $("#reason");
        let o = $("#other");
        if (c.val() === "" || (r.val() === "" || (r.val() === "Other" && o.val() === ""))) {
          Swal.fire({
            icon: "error",
            text: "Fields can not be empty",
          }).then(function(){
            e.preventDefault();
          })
        } else {
          const data = new FormData(this);
          fetch(app_ad.routes.reportComt, {
            method: "POST",
            body: data,
          })
            .then((res) => res.json())
            .then((res) => {
              if (res.r !== false) {
                Swal.fire({
                  icon: "success",
                  text: "Comment reported successfully",
                }).then(function () {
                  location.reload();
                });
              } else {
                Swal.fire({
                  icon: "error",
                  text: "Unexpected error, please try again",
                });
              }
            })
            .catch((err) => {
              Swal.fire({
                icon: "error",
                text: "Unexpected error, please try again",
              });
            });
        }
      });
    });
  },
};

function userDeleteModal(userDatad) {
  $('#delete-modal input[name="userId"]').val(userDatad.id);
  $('#delete-modal input[name="username"]').val(userDatad.username);
  $('#delete-modal input[name="email"]').val(userDatad.email);
  $('#delete-modal').css('display', 'block');
}

function reportUserModal(userDatar) {
    $('#report-modal input[name="userId"]').val(userDatar.id);
    $('#report-modal input[name="username"]').val(userDatar.username);
    $('#report-modal input[name="email"]').val(userDatar.email);
    $('#report-modal').css('display', 'block');
}

function suspendUserModal(userData) {
  $('#suspend-user-modal input[name="userId"]').val(userData.reportedUser);
  $('#suspend-user-modal input[name="reportId"]').val(userData.reportId);
  $('#suspend-user-modal input[name="reason"]').val(userData.reason);
  $('#suspend-user-modal').css('display', 'block');
}

function reportCommentModal(comtData) {
  $('#report-modal input[name="commentId"]').val(comtData.id);
  $('#report-modal input[name="content"]').val(comtData.content);
  $('#report-modal').css('display', 'block');
}

function reportPostModal(postData) {
  $('#report-modal input[name="postId"]').val(postData.id);
  $('#report-modal input[name="text"]').val(postData.text);
  $('#report-modal input[name="category"]').val(postData.category);
  $('#report-modal').css('display', 'block');
}

$('#btn-add').on('click', function() {
    $('#add-modal').css('display', 'block');
});

function showInput() {
    var select = document.getElementById("reason");
    var other = document.getElementById("other-r");

    other.innerHTML = '';

    if (select.value === "Other") {
        var input = document.createElement("input");
        input.type = "text";
        input.placeholder = "Please specify";
        input.name = "other";
        input.id = "other";
        input.className = "form-control";
        other.appendChild(input);
    }
}