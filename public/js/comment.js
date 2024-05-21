const comment = {
  comment: function (postId) {
    const spf = $("#commentPost-form");
    const ctn = $("#cmtcontent");
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
          if (res.r === true) {
            alerts({
              type: "success",
              text: "Comment added successfully"
          });
          } else if (res.r === 'e') {
            alerts({
              type: "function",
              icon: "error",
              text: "Filds can not be empty",
              callback: function() {
                ctn.val(""); 
              }
          });
        } else if (res.r === 'q') {
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
  
  replyComment: function (commentId) {

  },
};

