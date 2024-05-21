const comment = {
  routes: {
    addComment: "/Comments/createComment",
    replyComment: "/Comments/replyComment",

  },

  createComment: function (postId) {
    const spf = $("#commentPost-form");
    const ac = $("#allComments");
    const ctn = $("#cmtcontent");
    spf.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      $("<input>").attr("type", "hidden").attr("name", "postId").val(postId).appendTo(spf);
      const data = new FormData(this);
      fetch(comment.routes.addComment, {
        method: "POST",
        body: data,
      })
        .then((res) => res.json())
        .then((res) => {
          if (res.r === true) {
            alerts({
              type: "success",
              text: "Comment added successfully",
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
        .catch((err) => {
          console.log(err)
        });
    });
  },
  
  replyComment: function (postId, commentId) {
    const spf = $("#replyComment-form");
    const ctn = $("#replyContent");
    spf.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      $("<input>").attr("type", "hidden").attr("name", "postId").val(postId).appendTo(spf);
      $("<input>").attr("type", "hidden").attr("name", "commentId").val(commentId).appendTo(spf);
      const data = new FormData(this);
      fetch(comment.routes.replyComment, {
        method: "POST",
        body: data,
      })
        .then((res) => res.json())
        .then((res) => {
          if (res.r === true) {
            alerts({
              type: "success",
              text: "Reply added successfully"
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
};

