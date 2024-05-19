const post = {
  addPosts: function () {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const category = urlParams.get("category");
    var selectedHashtags = [];
    const apf = $("#add-post-form");

    apf.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      $("#hashtags-selected .hashtag span").each(function() {
          var hashtagValue = $(this).text().substring(1);
          selectedHashtags.push(hashtagValue);
      });
      $("<input>").attr("type", "hidden").attr("name", "hashtags").val(selectedHashtags.join(",")).appendTo(apf);

      const data = new FormData(this);
      fetch(app.routes.addPosts + '/' + category, {
        method: "POST",
        body: data,
      }) .then((res) => res.json())
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
              text: "Post added successfully"
          });
          } else if (res.r === 'e') {
            alerts({
              type: "function",
              icon: "error",
              text: "Filds can not be empty",
              callback: function() {
                  apf[0].reset(); 
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

  sharePost: function (postId) {
    const spf = $("#sharePost-form");
    spf.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      const data = new FormData(this);
      fetch(app.routes.sharePost + `/${app.user.id}` + `/${postId}`, {
        method: "POST",
        body: data,
      })
        .then((res) => res.json())
        .then((res) => {
          if (res.r === true) {
            alerts({
              type: "success",
              text: "Post shared successfully"
          });
          } else if (res.r === 'e') {
            alerts({
              type: "function",
              icon: "error",
              text: "Filds can not be empty",
              callback: function() {
                  spf[0].reset(); 
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

const textArea = document.querySelector("textarea");
const imagePreview = document.getElementById("img-view");
const inputFile = document.getElementById("img");

inputFile.addEventListener("change", function () {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (event) {
      const img = document.createElement("img");
      img.src = event.target.result;
      img.classList.add("w-8/12", "h-auto", "object-cover", "rounded");
      imagePreview.innerHTML = "";
      imagePreview.appendChild(img);
    };
    reader.readAsDataURL(file);
  }
});

const card = document.getElementById("initial-card");
const maxlength = 250;

textArea.addEventListener("input", () => {
  const value = textArea.value.length;
  textArea.style.height = "auto";
  textArea.style.height = textArea.scrollHeight + "px";
});

