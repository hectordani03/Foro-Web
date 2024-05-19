const app_ad = {
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
          fetch(app.routes.register, {
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
          fetch(app.routes.deleteUser, {
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
};

function openReportModal(userData) {
    $('#report-modal input[name="userId"]').val(userData.id);
    $('#report-modal input[name="username"]').val(userData.username);
    $('#report-modal input[name="email"]').val(userData.email);
    $('#report-modal input[name="role"]').val(userData.role);
    $('#report-modal').css('display', 'block');
}

function openDeleteModal(userData) {
    $('#delete-modal input[name="userId"]').val(userData.id);
    $('#delete-modal input[name="username"]').val(userData.username);
    $('#delete-modal input[name="email"]').val(userData.email);
    $('#delete-modal').css('display', 'block');
}

function openCommentModal(postData) {
  $('#datamodal input[name="id"]').val(postData.id);
  $('#datamodal input[name="content"]').val(postData.content);
  $('#datamodal').css('display', 'block');
}

function openPostModal(postData) {
  $('#datamodal input[name="id"]').val(postData.id);
  $('#datamodal input[name="text"]').val(postData.text);
  $('#datamodal input[name="category"]').val(postData.category);
  $('#datamodal').css('display', 'block');
}

$('#btn-add').on('click', function() {
    $('#add-modal').css('display', 'block');
});

function showInput() {
    var selectElement = document.getElementById("select");
    var reasonInput = document.getElementById("reason");

    reasonInput.innerHTML = '';

    if (selectElement.value === "Other") {
        var inputElement = document.createElement("input");
        inputElement.type = "text";
        inputElement.placeholder = "Please specify";
        inputElement.name = "reasonInput";
        inputElement.className = "form-control";
        reasonInput.appendChild(inputElement);
    }
}