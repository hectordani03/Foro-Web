const post = {
  addPosts: function () {
    const spf = $("#add-post-form");
    spf.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      const data = new FormData(this);
      fetch(app.routes.addPosts + `/${app.user.id}`, {
        method: "POST",
        body: data,
      })
        .then((res) => res.json())
        .then((res) => {
          if (res.r !== false) {
            Swal.fire({
              icon: "success",
              text: "Post added successfully",
            }).then(() => {
              location.href = app.routes.home;
              spf[0].reset();
            });
          } else {
            Swal.fire({
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
            icon: "error",
            text: "Unexpected error, please try again",
          }).then(() => {
            spf[0].reset();
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
      }).then((res) => res.json())
        .then((res) => {
          if (res.r !== false) {
            Swal.fire({
              icon: "success",
              text: "Post shared successfully",
            }).then(() => {
              location.href = app.routes.home;
              spf[0].reset();
            });
          } else {
            Swal.fire({
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
            icon: "error",
            text: "Unexpected error, please try again",
          }).then(() => {
            spf[0].reset();
          });
        });
    });
  },
};

$(function () {
  $("#text, #category, #img").on("input change", function () {
    const text = $("#text").val().trim();
    const category = $("#category").val();
    const img = $("#img").val();

    if ((text !== "" || img !== "") && category !== "" && category !== null) {
      $("#addPostBtn").prop("disabled", false);
    } else {
      $("#addPostBtn").prop("disabled", true);
    }
  });

  $("#text, #category, #img").trigger("input");
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


const containerSelectedHashtags = document.querySelector("#hashtags-selected");
const selectedHashtags = document.querySelectorAll("#hashtags-selected .hashtag");
const hashtags = document.querySelectorAll("#hashtags .hashtag");
const hashtagCapa = document.querySelectorAll(".capa-hashtag");


  hashtags.forEach((hashtag) => {
      hashtag.addEventListener("click", () => {
          if (containerSelectedHashtags.childElementCount < 3) {
          containerSelectedHashtags.innerHTML += hashtag.outerHTML;

          const selectedHashtags = document.querySelectorAll("#hashtags-selected .hashtag");

          selectedHashtags.forEach((selected) => {
              selected.addEventListener("click", e => {
                  selected.remove();
              });

              selected.addEventListener('mouseenter', () => {
                const capa = selected.querySelector('.capa-hashtag');
                capa.classList.add('visible');
            });
            
            selected.addEventListener('mouseleave', () => {
                const capa = selected.querySelector('.capa-hashtag');
                capa.classList.remove('visible');
            });
            
          });
        }
      });
  });


 