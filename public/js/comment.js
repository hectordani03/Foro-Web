const comment = {
  comment: function (postId) {
    const spf = $("#commentPost-form");
    spf.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      const data = new FormData(this);
      fetch(app.routes.addComment + `/${app.user.id}` + `/${postId}`, {
        method: "POST",
        body: data,
      })
        .then((res) => res.json())
        .then((res) => {
          if (res.r !== false) {
            Swal.fire({
              position: "center",
              showConfirmButton: false,
              timer: 1000,
              icon: "success",
              text: "Comment added successfully",
            }).then(() => {
              location.href = app.routes.home;
              spf[0].reset();
            });
          } else {
            Swal.fire({
              position: "center",
              showConfirmButton: false,
              timer: 1000,
              icon: "error",
              text: "Unexpected error, please try again",
            }).then(() => {
              spf[0].reset();
            });
          }
        })
        .then(() => {
          spf[0].reset();
        })
        .catch((err) => {
          Swal.fire({
            position: "center",
            showConfirmButton: false,
            timer: 1000,
            icon: "error",
            text: "Unexpected error, please try again",
          }).then(() => {
            spf[0].reset();
          });
        });
    });
  },
  
  replyComment: function (commentId) {

  },
};

