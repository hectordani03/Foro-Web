const post = {
  routes: {
    addPosts: "/Posts/createPosts",
    sharePost: "/Posts/sharePost",
  },

  addPosts: function () {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const category = urlParams.get("category");
    var selectedHashtags = [];
    const apf = $("#add-post-form");

    apf.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      $("#hashtags-selected .hashtag span").each(function () {
        var hashtagValue = $(this).text().substring(1);
        selectedHashtags.push(hashtagValue);
      });
      $("<input>")
        .attr("type", "hidden")
        .attr("name", "hashtags")
        .val(selectedHashtags.join(","))
        .appendTo(apf);
      $("<input>")
        .attr("type", "hidden")
        .attr("name", "category")
        .val(category)
        .appendTo($("#add-post-form"));

      const data = new FormData(this);
      fetch(post.routes.addPosts + "/" + category, {
        method: "POST",
        body: data,
      })
        .then((res) => res.json())
        .then((res) => {
          alerts({
            type: "function",
            icon: "error",
            text: "Fields can not be empty",
            callback: function () {
              e.preventDefault();
            },
          });

          alerts({
            type: "normal",
            icon: "error",
            text: "Filds can not be empty",
          });

          if (res.r === true) {
            alerts({
              type: "success",
              text: "Post added successfully",
            });
          } else if (res.r === "e") {
            alerts({
              type: "function",
              icon: "error",
              text: "Filds can not be empty",
              callback: function () {
                apf[0].reset();
              },
            });
          } else if (res.r === "i") {
            alerts({
              type: "function",
              icon: "error",
              text: "The selected image is incorrect! please try another one",
              callback: function () {
                e.preventDefault();
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
    });
  },

  sharePost: function (postId, category, userId) {
    const spf = $("#sharePost-form");
    $("<input>")
      .attr("type", "hidden")
      .attr("name", "postId")
      .val(postId)
      .appendTo(spf);
    $("<input>")
      .attr("type", "hidden")
      .attr("name", "category")
      .val(category)
      .appendTo(spf);
      $("<input>")
      .attr("type", "hidden")
      .attr("name", "ownerId")
      .val(userId)
      .appendTo(spf);
    spf.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      const data = new FormData(this);
      fetch(post.routes.sharePost, {
        method: "POST",
        body: data,
      })
        .then((res) => res.json())
        .then((res) => {
          if (res.r === true) {
            alerts({
              type: "success",
              text: "Post shared successfully",
            });
          } else if (res.r === "e") {
            alerts({
              type: "function",
              icon: "error",
              text: "Filds can not be empty",
              callback: function () {
                spf[0].reset();
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
    });
  },
};

$(function () {
  $("#text, #img").on("input change", function () {
    const text = $("#text").val().trim();
    const img = $("#img").val();

    if (text !== "" || img !== "") {
      $("#addPostBtn").prop("disabled", false);
    } else {
      $("#addPostBtn").prop("disabled", true);
    }
  });

  $("#text, #img").trigger("input");
});

const textArea = $("textarea");
const imagePreview = $("#img-view");
const inputFile = $("#img");

inputFile.on("change", function () {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (event) {
      const img = $("<img>", {
        src: event.target.result,
        class: "w-8/12 h-auto object-cover rounded",
      });
      imagePreview.empty();
      imagePreview.append(img);
    };
    reader.readAsDataURL(file);
  }
});

const card = $("#initial-card");
const maxlength = 250;

textArea.on("input", function () {
  const value = textArea.val().length;
  textArea.css("height", "auto");
  textArea.css("height", textArea[0].scrollHeight + "px");
});
