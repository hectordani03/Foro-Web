const app = {
  routes: {
    /* VIEWS */
    home: "http://forus.com/",
    catPosts: "/Posts/category",

    /* CONTROLLERS */
    getPosts: "/Posts/getPosts",
    getPostsByCategory: "/Posts/getPostsByCategory",
    getMostPopularPosts: "/Posts/getMostPopularPosts",
    getPostComments: "/Comments/getComments",

    getCategories: "/Categories/getCategories",
    getHashtags: "/Categories/getHashtags",

    like: "/Interactions/createLike",
    userNotificationsCount: "/Interactions/getNotificationCount",
    userNotifications: "/Interactions/getNotifications",
  },

  user: {
    sv: false,
    id: "",
    username: "",
    role: "",
    pic: "",
  },

  pp: $("#posts"),
  ss: $("#shareId"),
  cc: $("#commentsId"),
  ca: $("#categories-form"),
  ha: $("#hashtags"),
  nt: $("#notificationsId"),
  me: null,
  ac: $("#addCategoryId"),
  usp: [],
  com: [],
  catObjetive: [],

  allPosts: function () {
    let html = this.noContentPostsHtml();
    this.pp.html("");
    fetch(this.routes.getPosts)
      .then((res) => res.json())
      .then((posts) => {
        usp = posts;
        html = "";
        posts.forEach((post) => {
          html += this.postsHtmlBuilder(post);
        });
        this.pp.html(html);
      });
    $(document).on("click", ".like", function () {
      var postId = $(this).data("post-id");
      const userData = $.grep(usp, function (e) {return e.id === postId;})[0];
      var likes = $(".likes_count" + postId);
      var likesc = likes.data('count') || 0;
      var data = {
        postId: postId,
        type: "like",
        ownerId: userData.userId,
      };
      $.ajax({
        url: app.routes.like,
        type: "POST",
        data: data,
        dataType: "json",
        success: function (res) {
          if (res.r === "i") {
            likesc++;
          } else if (res.r === "d") {
            likesc--;
          }
          if (likesc > 0) {
            if (likes.length > 0) {
              likes.html(likesc);
              likes.data('count', likesc);
              likes.show(); 
            } else {
              var newLikeHtml = `<span id="likes" class="likes_count${postId}" data-count="${likesc}">${likesc}</span>`;
              $('.like[data-post-id="' + postId + '"]').append(newLikeHtml);
            }
          } else {
            if (likes.length > 0) {
              likes.data('count', 0); 
              likes.hide();
            }
          }
        },
      });
    });
  },

  mostPopularPost: function () {
    let html = this.noContentPostsHtml();
    this.pp.html("");
    fetch(this.routes.getMostPopularPosts)
      .then((res) => res.json())
      .then((posts) => {
        usp = posts;
        html = "";
        posts.forEach((post) => {
          html += this.postsHtmlBuilder(post);
        });
        this.pp.html(html);
      });
    $(document).on("click", ".like", function () {
      var postId = $(this).data("post-id");
      const userData = $.grep(usp, function (e) {return e.id === postId;})[0];
      var likes = $(".likes_count" + postId);
      var likesc = likes.data('count') || 0;
      var data = {
        postId: postId,
        type: "like",
        ownerId: userData.userId,
      };
      $.ajax({
        url: app.routes.like,
        type: "POST",
        data: data,
        dataType: "json",
        success: function (res) {
          if (res.r === "i") {
            likesc++;
          } else if (res.r === "d") {
            likesc--;
          }
          if (likesc > 0) {
            if (likes.length > 0) {
              likes.html(likesc);
              likes.data('count', likesc);
              likes.show(); 
            } else {
              var newLikeHtml = `<span id="likes" class="likes_count${postId}" data-count="${likesc}">${likesc}</span>`;
              $('.like[data-post-id="' + postId + '"]').append(newLikeHtml);
            }
          } else {
            if (likes.length > 0) {
              likes.data('count', 0); 
              likes.hide();
            }
          }
        },
      });
    });
  },

  postComments: function (postId) {
    const post = $.grep(usp, function (e) {
      return e.id === postId;
    })[0];
    this.cc.html("");

    let postHtml = this.postCommentsHtml(post);
    let commentsHtml = this.noContentComtsHtml();
    let footerHtml = this.footerCommentsHtml(post);
    fetch(this.routes.getPostComments + "/" + postId)
      .then((res) => res.json())
      .then((comments) => {
        if (comments.length > 0) {
          commentsHtml = "";
          let seenParentCommentIds = new Set();
          let parentComments = comments.filter((comment) => {
            if (
              comment.commentId === null &&
              !seenParentCommentIds.has(comment.id)
            ) {
              seenParentCommentIds.add(comment.id);
              return true;
            }
            return false;
          });

          parentComments.forEach((parentComment) => {
            com = comments;

            let parentHtml = this.parentCommentsHtml(parentComment);

            let childComments = comments.filter(
              (comment) => comment.commentId === parentComment.id
            );

            childComments.forEach((childComment) => {
              parentHtml += this.childCommentsHtml(childComment);
            });

            parentHtml += `</div></div>`;
            commentsHtml += parentHtml;
          });
        }
      })
      .finally(() => {
        this.cc.html(postHtml + commentsHtml + footerHtml);
        this.cc.on("click", function (e) {
          e.stopPropagation();
        });

        $(function () {
          $("body").removeClass("overflow-auto").addClass("overflow-hidden");
        });

        const modal = $(".modal-close");
        const capa = $(".capa-close");
        const close = $(".close-modal");

        if (modal.length && capa.length && close.length) {
          close.on("click", () => {
            modal.addClass("hidden");
            capa.addClass("hidden");
            $("body").removeClass("overflow-hidden").addClass("overflow-auto");
          });
        }
        $(function () {
          $("#cmtcontent").on("input change", function () {
            const content = $("#cmtcontent").val().trim();

            if (content !== "") {
              $("#commentbtn").prop("disabled", false);
            } else {
              $("#commentbtn").prop("disabled", true);
            }
          });

          $("#cmtcontent").trigger("input");
        });

        const rp = $(".replyComment");
        rp.on("click", function (e) {
          const commentId = Number($(this).attr("data-comment-id"));
          const comment = $.grep(com, function (e) {return e.id === commentId;})[0];
          const adrp = ".addReply" + commentId;
          $(adrp).html("");
          const html = app.repliesCommentHtml(postId, comment);
          $(adrp).html(html);
        });
      });
  },

  sharePost: function (postId) {
    const post = $.grep(usp, function (e) {
      return e.id === postId;
    })[0];

    let html = this.sharedPostsHtmlBuilder(post);
    this.ss.html(html);

    this.ss.on("click", function (e) {
      e.stopPropagation();
    });

    $(function () {
      $("body").removeClass("overflow-auto").addClass("overflow-hidden");
    });

    const modal = $(".modal-close");
    const capa = $(".capa-close");
    const close = $(".close-modal");

    close.on("click", () => {
      modal.addClass("hidden");
      capa.addClass("hidden");
      $("body").removeClass("overflow-hidden").addClass("overflow-auto");
    });
  },

  notifications: function () {

    let html = this.notificationsHtml();
    this.nt.html(html);

    const modal = $("#notificationsModal");
    const bellIcon = $("#bell-icon");
    let isModalVisible = false;

    // Elimina cualquier manejador de eventos click existente
    bellIcon.off("click");

    // Añade el manejador de eventos click
    bellIcon.on("click", () => {
      console.log("click");
      isModalVisible = !isModalVisible;
      if (isModalVisible) {
        modal.removeClass("hidden");
      } else {
        modal.addClass("hidden");
      }
    });

    const close = $(".close-modal");

    close.on("click", () => {
      modal.addClass("hidden");
      capa.addClass("hidden");
      $("body").removeClass("overflow-hidden").addClass("overflow-auto");
    });
},

  categories: function () {
    let html = "";
    const img = $("#objetiveGif");
    this.ca.html("");
    fetch(this.routes.getCategories)
      .then((res) => res.json())
      .then((categories) => {
        catObjetive = categories;  
        html = "";
        for (let category of categories) {
          html += `<li class="w-10 h-10">
            <button type="submit" name="category" value="${category.name}">
              <img class="rounded-lg" src="http://forus.com/resources/assets/img/categories/${category.img}" alt="" class="w-full">
            </button>
            <span class="desplegableText hidden relative left-14 bottom-8 text-gray-400 text-nowrap">${category.name}</span>
          </li>`;
        }
        this.ca.html(html);

        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const category = urlParams.get("category");

        if (category) { 
          const cat = $.grep(catObjetive, function(e) {
            return e.name === category;
          })[0];

          if (cat) {  
            const img = $("#objetiveGif");
            img.attr("src", "http://forus.com/resources/assets/img/categories/gifs/" + cat.gif);
          }
        }
      });
  },

  catPosts: function () {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const category = urlParams.get("category");

    let html = this.noContentPostsHtml();
    this.pp.html("");

    fetch(app.routes.getPostsByCategory + "?category=" + category, {
      method: "GET",
    })
      .then((res) => res.json())
      .then((posts) => {
        usp = posts;
        html = "";
        posts.forEach((post) => {
          html += this.postsHtmlBuilder(post);
        });
        this.pp.html(html);
      });
   $(document).on("click", ".like", function () {
      var postId = $(this).data("post-id");
      const userData = $.grep(usp, function (e) {return e.id === postId;})[0];
      var likes = $(".likes_count" + postId);
      var likesc = likes.data('count') || 0;
      var data = {
        postId: postId,
        type: "like",
        ownerId: userData.userId,
      };
      $.ajax({
        url: app.routes.like,
        type: "POST",
        data: data,
        dataType: "json",
        success: function (res) {
          if (res.r === "i") {
            likesc++;
          } else if (res.r === "d") {
            likesc--;
          }
          if (likesc > 0) {
            if (likes.length > 0) {
              likes.html(likesc);
              likes.data('count', likesc);
              likes.show(); 
            } else {
              var newLikeHtml = `<span id="likes" class="likes_count${postId}" data-count="${likesc}">${likesc}</span>`;
              $('.like[data-post-id="' + postId + '"]').append(newLikeHtml);
            }
          } else {
            if (likes.length > 0) {
              likes.data('count', 0); 
              likes.hide();
            }
          }
        },
      });
    });
  },


  getHashtags: function () {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const category = urlParams.get("category");

    let html = ``;
    this.ha.html("");

    fetch(app.routes.getHashtags + "?category=" + category, {
      method: "GET",
    })
      .then((res) => res.json())
      .then((hstgs) => {
        if (hstgs.length > 0) {
          html = "";
          for (let htg of hstgs) {
            const hashtags = htg.hashtag.split(",");

            for (let tag of hashtags) {
              const cleanedHashtag = tag.trim();
              html += `
                  <div class="hashtag text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center h-fit cursor-pointer relative" href="">
              <div class="capa-hashtag absolute top-0 left-0 bg-rose-800 z-50 w-full rounded-full h-full">x</div> 
              <span class="z-10">#${cleanedHashtag}</span>
            </div>
                  `;
            }
          }
        }
        this.ha.html(html);
        $(function () {
          $("#hashtags .hashtag").click(function () {
            if ($("#hashtags-selected .hashtag").length < 3) {
              var hashtagValue = $(this).find("span").text();
              $("#hashtags-selected").append($(this).clone());
            }
          });

          $("#hashtags-selected").on("click", ".hashtag", function () {
            $(this).remove();
          });

          $("#hashtags-selected").on("mouseenter", ".hashtag", function () {
            $(this).find(".capa-hashtag").addClass("visible");
          });

          $("#hashtags-selected").on("mouseleave", ".hashtag", function () {
            $(this).find(".capa-hashtag").removeClass("visible");
          });
        });
      });
  },

  menuCard: function (postId) {
    const post = $.grep(usp, function (e) {
      return e.id === postId;
    })[0];

    let html = this.menuCardHtmlBuilder(post);
    let menuContainer = $(`#menuId-${postId}`);
    menuContainer.html(html);
    console.log(menuContainer);

    menuContainer.on("click", function (e) {
      e.stopPropagation();
    });


    const modal = $(".modal-close");
    const capa = $(".capa-close");
    const close = $(".close-modal");

    close.on("click", () => {
      modal.addClass("hidden");
      capa.addClass("hidden");
      $("body").removeClass("overflow-hidden").addClass("overflow-auto");
    });
},

  likeBtn: function (postId) {
    let likeButton = document.querySelector(`#likeId-${postId}`);
    console.log(likeButton);
    if (likeButton.classList.contains('text-gray-400')) {
      likeButton.classList.remove('text-gray-400');
      likeButton.classList.add('text-red-500');
    } else {
      likeButton.classList.remove('text-red-500');
      likeButton.classList.add('text-gray-400');
    }

    // Se puede usar el toggle tmb we
    // likeButton.classList.toggle('text-red-500');
    
  },

  addCategory: function () {

    let html = this.addCategoryHtmlBuilder();
    this.ac.html(html);

    // Evita que el evento de clic se propague
    this.ac.on("click", function (e) {
      e.stopPropagation();
    });

    $("body").removeClass("overflow-auto").addClass("overflow-hidden");

    const close = $(".close-modal");
    const modalOverlay = $("#modal-overlay");

    close.on("click", function () {
      $("#modal").addClass("hidden");
      modalOverlay.addClass("hidden");
      $("body").removeClass("overflow-hidden").addClass("overflow-auto");
    });

    modalOverlay.on("click", function () {
      $("#modal").addClass("hidden");
      $(this).addClass("hidden");
      $("body").removeClass("overflow-hidden").addClass("overflow-auto");
    });

    document.addEventListener("DOMContentLoaded", function() {
      const addCategoryBtn = document.getElementById("add-category");
      const modal = document.getElementById("myModal");
      const modalOverlay = document.getElementById("modal-overlay");
      const closeModalBtn = document.getElementById("closeModal");
      const descripcionTextarea = document.getElementById('descripcion');
      const maxHeight = 220; // Máxima altura en píxeles
      
      descripcionTextarea.addEventListener('input', function() {
          this.style.height = 'auto';
          const newHeight = this.scrollHeight;
          if (newHeight > maxHeight) {
              this.style.height = maxHeight + '220px';
          } else {
              this.style.height = newHeight + '220px';
          }
      });
      
  
      addCategoryBtn.addEventListener("click", function() {
          modal.classList.remove("hidden");
          modalOverlay.classList.remove("hidden");
      });
  
      closeModalBtn.addEventListener("click", function() {
          modal.classList.add("hidden");
          modalOverlay.classList.add("hidden");
      });
  
      modalOverlay.addEventListener("click", function() {
          modal.classList.add("hidden");
          modalOverlay.classList.add("hidden");
      });
  });
  },

  /* HTML */
  postsHtmlBuilder: function (post) {
    var likesHtml = post.likes > 0 ? `
    <span id="likes" class="likes_count${post.id} text-gray-400 text-2xl mb-1 transition-all" data-count="${post.likes}">${post.likes}</span>` : ''; 
    
    var sharesHtml = post.shares > 0 ? `
    <span id="shares" class="shares_count${post.id} text-gray-400 text-2xl mb-1 transition-all" data-counts="${post.shares}">${post.shares}</span>
    ` : '';
    var commentsHtml = post.comments > 0 ? `
    <span id="comments" class="comments_count${post.id} text-gray-400 text-2xl mb-1 transition-all" data-countc="${post.comments}">${post.comments}</span>` : '';

    let postHtml = "";
    if (post.postId) {
      let orighashtagsHTML = this.buildHashtagsHtml(post.originalhtsg);
      postHtml += `
    <div class=" bg-gray-100 dark:bg-slate-600 shadow-lg w-full rounded-t-xl flex relative mt-5 opacity-100 p-4 top-2">
    <img id="profile_picture" class="w-12 h-11 bg-blue-500 rounded-full top-8 left-8" src="http://forus.com/resources/assets/img/profile/${
      post.profilePic
    }" alt="">
    <div class="flex flex-col ml-5 w-full">
        <h2 id="username" class="text-xl text-gray-400 font-semibold">${
          post.username
        }</h2>
        <p class="text-gray-400">${formatTimeSincePost(post.created_at)}</p>
        <h1 data-postText class="mb-3 text-lg text-gray-400 font-semibold w-11/12 mt-3">${
          post.text
}</h1>
        </div> 
    </div>
    <div id="post-card" class="bg-gray-100 dark:bg-slate-700 shadow-lg w-full rounded-xl flex flex-col relative h-fit self-start opacity-100">
    <!-- MENU MODAL -->
            <div id="menuId-${post.id}" class="absolute flex justify-center w-full mx-auto h-full" aria-labelledby="modal-title" role="dialog" aria-modal="true"></div>
    <div class="flex mt-5 ml-5">
    <img id="profile_picture" class="w-12 h-11 bg-blue-500 rounded-full top-8 left-8" src="http://forus.com/resources/assets/img/profile/${
      post.originalProfilePic
    }" alt="">
    <div class="flex flex-col ml-5">
        <h2 id="username" class="text-xl text-gray-400 font-semibold">${
          post.originalUsername
        }</h2>
        <p class="text-gray-400">${formatTimeSincePost(
          post.originalCreatedAt
        )}</p>
        </div>
        <!-- CARD MENU -->
            <div class="absolute right-5 top-0 h-fit z-50">
                <span id="menu-card" class="text-5xl text-gray-400 cursor-pointer select-none menu-card" onclick="app.menuCard(${post.id})">...</span>
            </div>
    </div>
    <p data-postText class="text-gray-400 w-10/12 mx-auto text-xl mt-8">${
      post.originalText
    }</p>
    <img class="w-10/12 mx-auto rounded-xl mt-7" src="http://forus.com/resources/assets/img/post/${
      post.originalImg
    }" alt="">
    
    <div class="flex gap-4 w-10/12 mx-auto mt-5">
        ${orighashtagsHTML}
    </div>
`;
    } else {
      let hashtagsHTML = this.buildHashtagsHtml(post.hashtag);
      postHtml += `
      <div class="bg-gray-100 dark:bg-slate-700 shadow-lg w-full rounded-xl flex flex-col relative mt-5 h-fit self-start opacity-100">
      <!-- MENU MODAL -->
            <div id="menuId-${post.id}" class="absolute flex justify-center w-full mx-auto h-full" aria-labelledby="modal-title" role="dialog" aria-modal="true"></div>
      <div class="flex mt-5 ml-5">
      <img id="profile_picture" class="w-12 h-11 bg-blue-500 rounded-full top-8 left-8" src="http://forus.com/resources/assets/img/profile/${
        post.profilePic
      }" alt="">
              <div class="flex flex-col ml-5">
                <h2 id="username" class="text-xl text-gray-400 font-semibold">${
                  post.username
                }</h2>
                <p class="text-gray-400">${formatTimeSincePost(
                  post.created_at
                )}</p>
              </div>
              <!-- CARD MENU -->
              <div class="absolute right-5 top-0 h-fit z-50">
                  <span id="menu-card" class="text-5xl text-gray-400 cursor-pointer select-none h-fit" onclick="app.menuCard(${post.id})">...</span>
              </div>  
      </div>
  
  <p data-postText class="text-gray-400 w-10/12 mx-auto text-xl mt-8">${
    post.text
  }</p>
  <img class="w-10/12 mx-auto rounded-xl mt-7" src="http://forus.com/resources/assets/img/post/${
    post.img
  }" alt="">
  
  <div id="hashtag-container" class="flex gap-4 w-10/12 mx-auto mt-5">
  ${hashtagsHTML}
</div>
  `;
    }

    const likeClass = post.userHasLiked ? 'text-red-500' : 'text-gray-400';
    return `
        <div data-postsection class="post w-11/12 lg:w-auto z-20">
      ${postHtml}
    <input type="hidden" name"category" value="${post.category}">
    <div id="post-footer" class="flex w-10/12 relative mt-10 mb-5 mx-auto">
        <div class="flex gap-3">
          <div id="likeId-${post.id}" data-post-id="${post.id}" ${!app.user.sv? "": `onclick="app.likeBtn(${post.id})"`} class="like ${likeClass} w-8 h-8 transition-all cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path class="fill-current" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
            </svg>
          </div>
          ${likesHtml}
        </div>
        <div class="flex gap-3">
        <div ${!app.user.sv ? "": `id="comment-button" onclick="app.postComments(${post.id})"`} class="text-gray-400 w-7 h-7 ml-5 mt-1 cursor-pointer comment-button ${!app.user.sv ? "nologued" : ""}">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path class="fill-current" d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64h96v80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416H448c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64z" />
        </svg>
        </div>
        ${commentsHtml}
        </div>
        <div class="flex gap-3">
        <div ${!app.user.sv? "": `id="share-button" onclick="app.sharePost(${post.id})"`} class="text-gray-400 w-8 h-8 absolute right-3 cursor-pointer share-button ${!app.user.sv ? "nologued" : ""}">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path class="fill-current" d="M307 34.8c-11.5 5.1-19 16.6-19 29.2v64H176C78.8 128 0 206.8 0 304C0 417.3 81.5 467.9 100.2 478.1c2.5 1.4 5.3 1.9 8.1 1.9c10.9 0 19.7-8.9 19.7-19.7c0-7.5-4.3-14.4-9.8-19.5C108.8 431.9 96 414.4 96 384c0-53 43-96 96-96h96v64c0 12.6 7.4 24.1 19 29.2s25 3 34.4-5.4l160-144c6.7-6.1 10.6-14.7 10.6-23.8s-3.8-17.7-10.6-23.8l-160-144c-9.4-8.5-22.9-10.6-34.4-5.4z" />
        </div>
        </svg>
        ${sharesHtml}
        </div>
    </div>
    </div>
    </div>
          `;
  },

  addCategoryHtmlBuilder: function () {
    return ` 
    <!-- Modal -->
    <div id="modal-overlay" class="fixed inset-0 bg-gray-500 bg-opacity-40 transition-opacity"></div>
    <div id="myModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75">
        <div class="bg-slate-700 rounded-lg p-6 max-w-4xl w-8/12">
            <!-- Header -->
            <div class="relative flex justify-center items-center mb-4">
                <h1 class="text-black text-3xl font-bold dark:text-white">FOR<span class="text-blue-500 ml-2">US</span></h1>
                <button id="closeModal" class="absolute right-0 text-gray-600 hover:text-gray-800 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Content -->
            <div class="flex">
                <!-- Left Side -->
                <div class="w-1/2 pr-2 flex flex-col">
                    <div class="mb-5 mt-9">
                        <input class="text-xl border-b-2 border-gray-300 py-2 focus:border-gray-400 transition-colors focus:outline-none bg-slate-200 dark:bg-slate-600 text-gray-400 font-semibold shadow-md rounded-xl w-full px-2" type="text" id="nombre" placeholder="Name of category">
                    </div>
                    <div class="mb-5">
                        <input class="text-xl border-b-2 border-gray-300 py-2 focus:border-gray-400 transition-colors focus:outline-none bg-slate-200 dark:bg-slate-600 text-gray-400 font-semibold shadow-md rounded-xl w-full px-2" type="text" id="tema" placeholder="Topic">
                    </div>
                    <div class="mb-5">
                        <textarea class="auto-expand text-xl border-b-2 border-gray-300 py-2 focus:border-gray-400 transition-colors focus:outline-none bg-slate-200 dark:bg-slate-600 text-gray-400 font-semibold shadow-md rounded-xl w-full px-2 h-[220px] max-h-[220px] overflow-y-auto" id="descripcion" placeholder="Description"></textarea>
                    </div>
                    
                    
                </div>
                <!-- Right Side -->
                <div class="w-1/2 pl-2 flex flex-col justify-between">
                    <div class="mb-3">
                        <h2 class="text-black text-xl font-bold dark:text-white text-center">Add a category <span class="text-blue-500">Image</span></h2>
                        <label for="profilePic" id="drop-area" class="mt-2 mb-2 w-full">
                            <div id="img-view" class="p-2 rounded-md text-center">
                                <div class="shadow-lg mx-20 h-36 rounded-xl bg-slate-200 dark:bg-slate-600 py-3">
                                    <div class="mt-2 border-2 border-dashed border-blue-500 w-3/4 mx-auto text-center flex flex-col justify-center items-center rounded-xl h-24 hover:border-gray-400 transition-colors">
                                        <input type="file" id="profilePic" name="profilePic" accept=".jpg, .png, .jpeg" hidden>
                                        <svg class="w-16 h-16 mt-2 mx-auto cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                            <path class="fill-blue-500 hover:fill-gray-400 transition-colors" d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"/>
                                        </svg>
                                        <h1 class="text-black text-xs font-bold mt-1 dark:text-white">Drag File Here To Upload</h1>
                                        <h2 class="text-blue-500 font-bold mb-2 text-xs">Max File Size 5mb</h2>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="mb-3">
                        <h2 class="text-black text-xl font-bold dark:text-white text-center">Add a background <span class="text-blue-500">Image</span></h2>
                        <label for="profilePic" id="drop-area" class="mt-2 mb-2 w-full">
                            <div id="img-view" class="p-2 rounded-md text-center">
                                <div class="shadow-lg mx-auto h-36 rounded-xl bg-slate-200 dark:bg-slate-600 py-3">
                                    <div class="mt-3 border-2 border-dashed border-blue-500 w-3/4 mx-auto text-center flex flex-col justify-center items-center rounded-xl h-24 hover:border-gray-400 transition-colors">
                                        <input type="file" id="profilePic" name="profilePic" accept=".jpg, .png, .jpeg" hidden>
                                        <svg class="w-16 h-16 mt-2 mx-auto cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                            <path class="fill-blue-500 hover:fill-gray-400 transition-colors" d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z"/>
                                        </svg>
                                        <h1 class="text-black text-xs font-bold mt-1 dark:text-white">Drag File Here To Upload</h1>
                                        <h2 class="text-blue-500 font-bold mb-2 text-xs">Max File Size 5mb</h2>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <!-- Footer -->
                    <div class="flex justify-center mb-5 mt-2">  <!-- Revisar el onclick -->
                        <button type="submit" onclick="profile.updateUser()" id="updatebtn" class="text-xl bg-sky-400 text-white text-center w-1/2 py-2 rounded-lg font-semibold">Upload</button>
                    </div>
                    ${sharesHtml}
        </div>
                </div>
        </div>
    </div>
`;
  },

  sharedPostsHtmlBuilder: function (post) {
    return `
    <div id="capa" class="fixed inset-0 bg-gray-500 bg-opacity-40 transition-opacity capa-close"></div>
        <section id="modal" class="bg-gray-100 dark:bg-slate-700 rounded-3xl lg:xl-6/12 xl:w-5/12 w-10/12 md:w-7/12 mx-auto mt-12 -mb-16 flex flex-col fixed modal-close" style="height: 85%;">
            <div class="flex justify-between fixed lg:xl-6/12 xl:w-5/12 w-10/12 md:w-7/12 z-50 bg-gray-100 dark:bg-slate-700 pb-4 overflow-y-auto rounded-3xl">
                <h1 class="text-black flex text-2xl font-bold mt-5 ml-5 dark:text-white">FOR <span class="text-blue-500 ml-2">US</span></h1>
                <p class="font-bold text-xl mt-5 text-center dark:text-white">Share Post</p>
                <div class="close-modal text-gray-400 w-8 h-8 transition-all cursor-pointer mt-5 mr-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline" viewBox="0 0 512 512">
                        <path class="fill-current" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                    </svg>
                </div>
            </div>
            <hr class="w-full mt-20 border dark:border-slate-600">
            <div id="card-scrollbar" class="overflow-y-auto z-40 relative h-auto">
                <div class="bg-gray-100 dark:bg-slate-700 w-11/12 rounded-3xl flex flex-col relative  h-fit self-start opacity-100 mx-auto">
                    <!-- TOP CARD CONTENT -->
                    <div class="flex mt-5 w-full">
                        <img class="w-12 h-11 bg-blue-500 rounded-full top-8 left-8" src="http://forus.com/resources/assets/img/profile/${
                          app.user.pic
                        }" alt="">
                        <div class="flex flex-col ml-5 w-full">
                            <div class="flex items-center w-full">
                                <h2 class="text-xl text-gray-400 font-semibold">${
                                  app.user.username
                                }</h2>
                                <svg class="w-5 h-5 ml-3" viewBox="0 0 17.00 17.00" version="1.1" class="svg inline mr-10 h-10 mt-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#292da8" stroke="#292da8" stroke-width="0.00017">
                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                    <g id="SVGRepo_iconCarrier">
                                        <path d="M8.516 0c-4.687 0-8.5 3.813-8.5 8.5s3.813 8.5 8.5 8.5 8.5-3.813 8.5-8.5-3.814-8.5-8.5-8.5zM1.041 9h2.937c0.044 1.024 0.211 2.031 0.513 3h-2.603c-0.481-0.906-0.776-1.923-0.847-3zM3.978 8h-2.937c0.071-1.077 0.366-2.094 0.847-3h2.6c-0.301 0.969-0.467 1.976-0.51 3zM5.547 5h5.896c0.33 0.965 0.522 1.972 0.569 3h-7.034c0.046-1.028 0.239-2.035 0.569-3zM4.978 9h7.035c-0.049 1.028-0.241 2.035-0.572 3h-5.891c-0.331-0.965-0.524-1.972-0.572-3zM13.013 9h2.978c-0.071 1.077-0.366 2.094-0.847 3h-2.644c0.302-0.969 0.469-1.976 0.513-3zM13.013 8c-0.043-1.024-0.209-2.031-0.51-3h2.641c0.48 0.906 0.775 1.923 0.847 3h-2.978zM14.502 4h-2.354c-0.392-0.955-0.916-1.858-1.55-2.7 1.578 0.457 2.938 1.42 3.904 2.7zM9.074 1.028c0.824 0.897 1.484 1.9 1.972 2.972h-5.102c0.487-1.071 1.146-2.073 1.97-2.97 0.199-0.015 0.398-0.030 0.602-0.030 0.188 0 0.373 0.015 0.558 0.028zM6.383 1.313c-0.629 0.838-1.151 1.737-1.54 2.687h-2.314c0.955-1.267 2.297-2.224 3.854-2.687zM2.529 13h2.317c0.391 0.951 0.915 1.851 1.547 2.689-1.561-0.461-2.907-1.419-3.864-2.689zM7.926 15.97c-0.826-0.897-1.488-1.899-1.978-2.97h5.094c-0.49 1.072-1.152 2.075-1.979 2.972-0.181 0.013-0.363 0.028-0.547 0.028-0.2 0-0.395-0.015-0.59-0.030zM10.587 15.703c0.636-0.842 1.164-1.747 1.557-2.703h2.358c-0.968 1.283-2.332 2.247-3.915 2.703z" fill="#4846af"></path>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <form class="" id="sharePost-form" method="POST" autocomplete="off" enctype="multipart/form-data">

                        <textarea class="relative rounded-lg text-lg text-gray-400 bg-gray-100 dark:bg-slate-700 w-full resize-none outline-none font-medium mt-5 ml-5" rows="" maxlength="380" placeholder="Comment as ${
                          app.user.username
                        }" name="text" id="text"></textarea>
                        <hr class="w-full mt-5 border dark:border-slate-600">
                        <div class="flex mt-5  w-full">
                            <img class="w-12 h-11 bg-blue-500 rounded-full top-8 left-8" src="http://forus.com/resources/assets/img/profile/${
                              post.profilePic
                            }" alt="">
                            <div class="flex flex-col ml-5 w-full">
                                <div class="flex items-center w-full">
                                    <h2 class="text-xl text-gray-400 font-semibold">${
                                      post.username
                                    }</h2>
                                </div>

                                <p class="text-gray-400">${formatTimeSincePost(
                                  post.created_at
                                )}</p>
                            </div>
                        </div>
                        <p class="text-gray-400 w-12/12 mx-auto text-xl mt-8">${
                          post.text
                        }</p>
                        <img class="w-12/12 mx-auto rounded-xl mt-7" src="http://forus.com/resources/assets/img/post/${
                          post.img
                        }" alt="">

                        <div class="flex gap-4 w-12/12 mx-auto mt-5">
                           ${this.buildHashtagsHtml(post.hashtag)}
                        </div>
                        <hr class="w-full mt-10 mb-5">
                        <button type="submit" onclick="post.sharePost(${post.id}, '${post.category}', '${post.userId}')" id="sharebtn" class="w-full mx-auto btn bg-sky-500 rounded-xl p-3 text-white">Share</button>
                        </form>
                </div>
            </div>
        </section>
    `;
  },

  menuCardHtmlBuilder: function (post) {
    return `
    <div id="capa" class="absolute inset-0 bg-gray-500 bg-opacity-40 transition-opacity capa-close h-auto w-full rounded-xl"></div>
        <section id="modal" class="bg-gray-100 dark:bg-slate-700 rounded-3xl w-11/12 mx-auto mt-12 -mb-24 flex flex-col modal-close h-fit z-50">
            <div class="close-modal text-gray-400 w-8 h-8 transition-all cursor-pointer mt-5 mr-5 absolute right-5">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline" viewBox="0 0 512 512">
                    <path class="fill-current" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                </svg>
            </div>
            <div class="rounded-3xl flex flex-col justify-center items-center gap-5 h-fit self-start w-full shadow-lg bg-slate-700 opacity-100">
              <div class="flex mb-5 mt-14">
                    <div class="text-gray-400 w-9 h-9 cursor-pointer ml-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path class="fill-current" d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z" />
                        </svg>
                    </div>
                    <p class="text-gray-400 font-semibold ml-5 text-xl mt-1 cursor-pointer">Reportar Publicacion</p>
                </div>
                <hr class="w-full border-t-2">
                <div class="flex mb-5 mt-8">
                    <div class="text-gray-400 w-9 h-9 cursor-pointer ml-2 mb-2">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M15 16L20 21M20 16L15 21M4 21C4 17.134 7.13401 14 11 14M15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    </div>
                    <p class="text-gray-400 font-semibold ml-5 text-xl mt-1 cursor-pointer">Reportar Usuario</p>
                </div>
                <hr>
            </div>
        </section>
    `;
  },

  buildHashtagsHtml: function (hashtag) {
    if (hashtag !== null && hashtag !== undefined && hashtag.trim() !== "") {
      const hashtags = hashtag.split(",");
      if (
        hashtags.length > 0 &&
        hashtags[0] !== undefined &&
        hashtags[0].trim() !== ""
      ) {
        return hashtags
          .map((hashtag) => {
            return `<a data-postText class="text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center">#${hashtag.trim()}</a>`;
          })
          .join(" ");
      }
    }
    return "";
  },

  postCommentsHtml: function (post) {
    let hashtagsHTML = this.buildHashtagsHtml(post.hashtag);
    return `
    <div id="capa" class="fixed inset-0 bg-gray-500 bg-opacity-30 dark:bg-opacity-40 transition-opacity capa-close"></div>
    <section id="modal" class="bg-gray-100 dark:bg-slate-700 rounded-xl w-11/12 md:w-9/12 xl:w-7/12 mx-auto h-screen flex flex-col fixed modal-close z-50 transition-all comments">
      <div class="flex justify-between fixed w-11/12 md:w-9/12 xl:w-7/12 z-50 bg-gray-100 dark:bg-slate-700 shadow-lg pb-4">
        <h1 class="text-black flex text-2xl font-bold mt-5 ml-5 dark:text-white">FOR <span class="text-blue-500 ml-2">US</span></h1>
        <p class="font-bold text-xl mt-5 dark:text-white">${post.username}'s Post</p>
        <div id="close" class="close-modal text-gray-400 w-8 h-8 transition-all cursor-pointer mt-5 mr-5">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path class="fill-current" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
            </svg>
        </div>
      </div>
    <hr class="w-full mt-5">
    <div id="card-scrollbar" class="overflow-y-auto z-40 h-auto relative mt-6">
        <div class="bg-gray-100 dark:bg-slate-700 w-10/12 rounded-xl flex flex-col relative mt-5 h-fit self-start opacity-100 mx-auto">
            <div id="capa" class="bg-gray-500 opacity-30 w-full h-full absolute hidden rounded-xl transition ease-in z-50"></div>
            <div id="custom-modal" class="absolute w-full h-full flex flex-col justify-center items-center opacity-100 transition ease-in"></div>
            <div class="flex mt-5 ml-5">
                <img class="w-12 h-11 bg-blue-500 rounded-full top-8 left-8" src="http://forus.com/resources/assets/img/profile/${post.profilePic}" alt="">
                <div class="flex flex-col ml-5">
                    <h2 class="text-xl text-gray-400 font-semibold">${post.username}</h2>
                </div>
                <div class="absolute right-5 top-0">
                    <span id="menu-card" class="text-5xl text-gray-400 cursor-pointer select-none">...</span>
                </div>
            </div>
            <p class="text-gray-400 w-10/12 mx-auto text-xl mt-8">${post.text}</p>
            <img class="w-10/12 mx-auto rounded-xl mt-7" src="http://forus.com/resources/assets/img/post/${post.img}" alt="">
            <div class="flex gap-4 w-10/12 mx-auto mt-5">
                ${hashtagsHTML}
            </div>
        </div>
        <hr class="w-full mt-5 border dark:border-slate-600">
        <div id="allComments" class=" mb-36">
        `;
  },

  footerCommentsHtml: function (post) {
    return `
    </div></div>
    </div>
    <section class="fixed bottom-0 bg-gray-100 dark:bg-slate-700 w-11/12 md:w-9/12 xl:w-7/12 shadow-inner z-50">
    <form class="" id="commentPost-form" method="POST" autocomplete="off" enctype="multipart/form-data">
      <div class="w-11/12 mx-auto flex mt-5 mb-5">
        <img class="w-12 h-11 bg-blue-500 rounded-full top-8 left-8" src="http://forus.com/resources/assets/img/profile/${app.user.pic}" alt="">
          <div class="dark:bg-slate-700 ml-5 rounded-xl shadow-lg w-10/12">
              <textarea name="content" id="cmtcontent" class="relative rounded-lg text-lg text-gray-400 bg-gray-200 dark:bg-slate-600 w-full resize-none outline-none font-medium pl-5 py-2" rows="" maxlength="380" placeholder="Comment as ${app.user.username}"></textarea>
          </div>
          <button type="submit" onclick="comment.createComment(${post.id}, '${post.userId}')" id="commentbtn" class="text-gray-400 w-10 h-10 transition-all cursor-pointer ml-5 mt-1" disabled>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                  <path class="fill-current" d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480V396.4c0-4 1.5-7.8 4.2-10.7L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3.3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z" />
              </svg>
          </button>
        </form>
      </div>
    </section>
  </section>
`;
  },

  parentCommentsHtml: function (parentComment) {
    return `
    <div class="w-10/12 mx-auto relative">
    <div class="comment-container flex gap-5 mt-10 relative">
    <img class="w-12 h-10 bg-blue-500 rounded-full top-8 left-8 z-50" src="http://forus.com/resources/assets/img/profile/${parentComment.profilePic}" alt="">
    <div class="rounded-xl bg-gray-200 dark:bg-slate-600 shadow-lg comment-interactions z-50">
        <div class="ml-5 mr-5 mt-1 mb-2">
            <div class="flex gap-2">
                <p class="text-gray-400 font-bold">${parentComment.username}</p>
                <small class="text-gray-400 relative top-0.5">${formatTimeSincePost(parentComment.created_at)}</small>
            </div>
            <span class="text-gray-400">${parentComment.content}</span>
        </div>
    </div>
</div>


        <div class="flex w-10/12 mx-auto mt-3 gap-5 relative flex-col">
            <div data-comment-id="${parentComment.id}" class="replyComment text-gray-400 h-6 cursor-pointer flex gap-2 ml-5">
                <i class="fa-duotone fa-messages icon mt-1"></i>
                <span class="">Reply</span>
            </div>
            <div class="addReply${parentComment.id}">
          
            </div>
            `;
  },

  childCommentsHtml: function (childComment) {
    return `
    <div class="w-8 flex flex-col items-center absolute -left-12 -top-3">
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-radius-bottom-left" width="44" viewBox="0 0 24 50" stroke-width="1.5" stroke="#9ca3af" fill="none" stroke-linecap="round" stroke-linejoin="round">
    <path stroke="none" d="M0 0h24v30H0z" fill="none"/>
    <path d="M19 48h-6a8 8 0 0 1 -8 -8v-92" />
  </svg>
  </div>
    <div class="flex gap-5">
      <img class="w-12 h-10 bg-blue-500 rounded-full top-8 left-8" src="http://forus.com/resources/assets/img/profile/${childComment.profilePic}" alt="">
      <div class="rounded-xl bg-gray-200 dark:bg-slate-600 shadow-lg">
          <div class="ml-5 mr-5 mt-1 mb-2">
              <div class="flex gap-2">
                <p class="text-gray-400 font-bold">${childComment.username}</p>
                <small class="text-gray-400 relative top-0.5">${formatTimeSincePost(childComment.created_at)}</small>
              </div>
              <span class="text-gray-400">${childComment.content}</span>
          </div>
      </div>
    </div>
    `;
  },

  repliesCommentHtml: function (postId, comment) {
    return `
<form class="flex" id="replyComment-form" method="POST" autocomplete="off" enctype="multipart/form-data">
  <div class="dark:bg-slate-700 ml-5 rounded-xl shadow-lg w-10/12">
    <textarea name="content" id="replyContent" class="relative rounded-lg text-md text-gray-400 bg-gray-200 dark:bg-slate-600 w-full resize-none outline-none pl-5 font-medium py-3" rows="" maxlength="380" placeholder="Reply to ${comment.username}"></textarea>
  </div>
  <button type="submit" onclick="comment.replyComment(${postId}, ${comment.id}, ${comment.userId})" id="commentbtn" class="text-gray-400 w-6 h-6 transition-all cursor-pointer ml-5 mt-5">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path class="fill-current" d="M498.1 5.6c10.1 7 15.4 19.1 13.5 31.2l-64 416c-1.5 9.7-7.4 18.2-16 23s-18.9 5.4-28 1.6L284 427.7l-68.5 74.1c-8.9 9.7-22.9 12.9-35.2 8.1S160 493.2 160 480V396.4c0-4 1.5-7.8 4.2-10.7L331.8 202.8c5.8-6.3 5.6-16-.4-22s-15.7-6.4-22-.7L106 360.8 17.7 316.6C7.1 311.3.3 300.7 0 288.9s5.9-22.8 16.1-28.7l448-256c10.7-6.1 23.9-5.5 34 1.4z"/>
      </svg>
  </button>
</form>
`;
  },

  notificationsHtml: function () {
    return `
    <div id="notificationsModal" class="w-full max-w-xs p-4 text-gray-900 bg-white shadow-2xl z-50 dark:bg-slate-800 dark:text-gray-300 fixed right-0 top-16 rounded-3xl" role="alert">
      <div class="flex items-center mb-3">
        <span class="mb-1 text-xl font-semibold text-gray-900 dark:text-white">New notifications</span>
        <button type="button" class=" close-modal ms-auto -mx-1.5 -my-1.5 bg-white justify-center items-center flex-shrink-0 text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-notification" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
      </div>
      <div class="flex flex-col gap-1">



      <!-- NOTIFICATION COMMENT PUTO -->
        <div class="flex items-center hover:bg-slate-200 dark:hover:bg-slate-700 cursor-pointer hover:rounded-lg p-2">
          <div class="relative inline-block shrink-0">
            <img class="w-12 h-12 rounded-full" src="http://forus.com/resources/assets/img/profile/Cali_24.jpg" alt=""/>
            
            <span class="absolute bottom-0 right-0 inline-flex items-center justify-center w-6 h-6 bg-blue-600 rounded-full">
            <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 18" fill="currentColor">
            <path d="M18 4H16V9C16 10.0609 15.5786 11.0783 14.8284 11.8284C14.0783 12.5786 13.0609 13 12 13H9L6.846 14.615C7.17993 14.8628 7.58418 14.9977 8 15H11.667L15.4 17.8C15.5731 17.9298 15.7836 18 16 18C16.2652 18 16.5196 17.8946 16.7071 17.7071C16.8946 17.5196 17 17.2652 17 17V15H18C18.5304 15 19.0391 14.7893 19.4142 14.4142C19.7893 14.0391 20 13.5304 20 13V6C20 5.46957 19.7893 4.96086 19.4142 4.58579C19.0391 4.21071 18.5304 4 18 4Z" fill="currentColor"/>
            <path d="M12 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585786C0.210714 0.960859 0 1.46957 0 2V9C0 9.53043 0.210714 10.0391 0.585786 10.4142C0.960859 10.7893 1.46957 11 2 11H3V13C3 13.1857 3.05171 13.3678 3.14935 13.5257C3.24698 13.6837 3.38668 13.8114 3.55279 13.8944C3.71889 13.9775 3.90484 14.0126 4.08981 13.996C4.27477 13.9793 4.45143 13.9114 4.6 13.8L8.333 11H12C12.5304 11 13.0391 10.7893 13.4142 10.4142C13.7893 10.0391 14 9.53043 14 9V2C14 1.46957 13.7893 0.960859 13.4142 0.585786C13.0391 0.210714 12.5304 0 12 0Z" fill="currentColor"/>
            
            </svg>
            <span class="sr-only">Message icon</span>
            </span>
          </div>
          <div class="ms-3 text-sm font-normal">
            <div class="text-sm font-semibold text-gray-900 dark:text-white">Jose Joshua</div>
            <div class="text-sm font-normal">commented on your post</div> 
            <span class="text-xs font-medium text-blue-600 dark:text-blue-500">a few seconds ago</span>   
          </div>
        </div>
        
        

        <!-- NOTIFICATION LIKE PUTO -->
        <div class="flex items-center hover:bg-slate-200 dark:hover:bg-slate-700 cursor-pointer hover:rounded-lg p-2">
          <div class="relative inline-block shrink-0">
            <img class="w-12 h-12 rounded-full" src="http://forus.com/resources/assets/img/profile/Cali_24.jpg" alt=""/>
            <span class="absolute bottom-0 right-0 inline-flex items-center justify-center w-6 h-6 bg-red-600 rounded-full">
            <svg class="w-3 h-3 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path class="fill-current" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/></svg>
            <path d="M5 10a1 1 0 0 1 .993 .883l.007 .117v9a1 1 0 0 1 -.883 .993l-.117 .007h-1a2 2 0 0 1 -1.995 -1.85l-.005 -.15v-7a2 2 0 0 1 1.85 -1.995l.15 -.005h1z" stroke-width="0" fill="currentColor" />
          </svg>
            <span class="sr-only">Message icon</span>
            </span>
          </div>
          <div class="ms-3 text-sm font-normal">
            <div class="text-sm font-semibold text-gray-900 dark:text-white">Jose Joshua</div>
            <div class="text-sm font-normal">liked your post</div> 
            <span class="text-xs font-medium text-blue-600 dark:text-blue-500">2 minutes ago</span>   
          </div>
        </div>



        <!-- NOTIFICATION SHARE PUTO -->
        <div class="flex items-center hover:bg-slate-200 dark:hover:bg-slate-700 cursor-pointer hover:rounded-lg p-2">
          <div class="relative inline-block shrink-0">
            <img class="w-12 h-12 rounded-full" src="http://forus.com/resources/assets/img/profile/Cali_24.jpg" alt=""/>
            <span class="absolute bottom-0 right-0 inline-flex items-center justify-center w-6 h-6 bg-green-600 rounded-full">
            <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path class="fill-current" d="M307 34.8c-11.5 5.1-19 16.6-19 29.2v64H176C78.8 128 0 206.8 0 304C0 417.3 81.5 467.9 100.2 478.1c2.5 1.4 5.3 1.9 8.1 1.9c10.9 0 19.7-8.9 19.7-19.7c0-7.5-4.3-14.4-9.8-19.5C108.8 431.9 96 414.4 96 384c0-53 43-96 96-96h96v64c0 12.6 7.4 24.1 19 29.2s25 3 34.4-5.4l160-144c6.7-6.1 10.6-14.7 10.6-23.8s-3.8-17.7-10.6-23.8l-160-144c-9.4-8.5-22.9-10.6-34.4-5.4z"/></svg>
            <span class="sr-only">Message icon</span>
            </span>
          </div>
          <div class="ms-3 text-sm font-normal">
            <div class="text-sm font-semibold text-gray-900 dark:text-white">Jose Joshua</div>
            <div class="text-sm font-normal">shared your post</div> 
            <span class="text-xs font-medium text-blue-600 dark:text-blue-500">2 minutes ago</span>   
          </div>
        </div>
      </div>
    </div>
  `;
},
              
              /* NO CONTENT */
  noContentPostsHtml: function () {
    return `
    <div class=" relative left-64 flex flex-col justify-center items-center mx-auto text-center w-full mb-10">
    <svg class="w-52 h-auto mx-auto relative left-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path class="fill-gray-400 dark:fill-gray-500" d="M192 104.8c0-9.2-5.8-17.3-13.2-22.8C167.2 73.3 160 61.3 160 48c0-26.5 28.7-48 64-48s64 21.5 64 48c0 13.3-7.2 25.3-18.8 34c-7.4 5.5-13.2 13.6-13.2 22.8c0 12.8 10.4 23.2 23.2 23.2H336c26.5 0 48 21.5 48 48v56.8c0 12.8 10.4 23.2 23.2 23.2c9.2 0 17.3-5.8 22.8-13.2c8.7-11.6 20.7-18.8 34-18.8c26.5 0 48 28.7 48 64s-21.5 64-48 64c-13.3 0-25.3-7.2-34-18.8c-5.5-7.4-13.6-13.2-22.8-13.2c-12.8 0-23.2 10.4-23.2 23.2V464c0 26.5-21.5 48-48 48H279.2c-12.8 0-23.2-10.4-23.2-23.2c0-9.2 5.8-17.3 13.2-22.8c11.6-8.7 18.8-20.7 18.8-34c0-26.5-28.7-48-64-48s-64 21.5-64 48c0 13.3 7.2 25.3 18.8 34c7.4 5.5 13.2 13.6 13.2 22.8c0 12.8-10.4 23.2-23.2 23.2H48c-26.5 0-48-21.5-48-48V343.2C0 330.4 10.4 320 23.2 320c9.2 0 17.3 5.8 22.8 13.2C54.7 344.8 66.7 352 80 352c26.5 0 48-28.7 48-64s-21.5-64-48-64c-13.3 0-25.3 7.2-34 18.8C40.5 250.2 32.4 256 23.2 256C10.4 256 0 245.6 0 232.8V176c0-26.5 21.5-48 48-48H168.8c12.8 0 23.2-10.4 23.2-23.2z" />
      </svg>
      <h1 class="text-4xl font-bold text-gray-400 dark:text-gray-500 text-center w-6/12 mx-auto mt-5">
          No content to display
      </h1>
    </div>
    `;
  },

  noContentComtsHtml: function () {
    return ` 
    <div class=" relative">
    <div class="flex flex-col w-6/12 mx-auto mt-20 text-center justify-center items-center">
    <i class="fa-duotone fa-comment-slash text-8xl font-bold text-gray-400 dark:text-gray-500 mt-3 mb-5"></i>
    <h1 class="text-4xl font-bold text-gray-400 dark:text-gray-500">No Comments yet</h1>
    <small class="text-2xl font-bold text-gray-400 dark:text-gray-500">Be the first to comment</small>
    </div>
    </div>
`;
  },

  categoryHtml: function () {

  }
};

function formatTimeSincePost(postDate) {
  var currentDate = new Date();
  var postDateObj = new Date(postDate);

  var timeDifference = currentDate - postDateObj;

  var seconds = Math.floor(timeDifference / 1000);
  var minutes = Math.floor(seconds / 60);
  var hours = Math.floor(minutes / 60);
  var days = Math.floor(hours / 24);

  if (days > 0) {
    return days + " d";
  } else if (hours > 0) {
    return hours + " h";
  } else if (minutes > 0) {
    return minutes + " min";
  } else {
    return seconds + " s";
  }
}

function loadDoc() {
  function fetchNotifications() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        var responseText = this.responseText;
        if (responseText) {
          var response;
          try {
            response = JSON.parse(responseText);
          } catch (e) {
            response = null;
          }
          if (Array.isArray(response) && response.length > 0 && response[0].tt != null) {
            var notificationsCount = response[0].tt;
            document.getElementById("userNotifications").innerHTML = notificationsCount;
          } else {
            document.getElementById("userNotifications").innerHTML = '';
          }
        } else {
          document.getElementById("userNotifications").innerHTML = '';
        }
      } else if (this.readyState == 4) {
        document.getElementById("userNotifications").innerHTML = '';
      }
    };
    xhttp.open("GET", app.routes.userNotificationsCount, true);
    xhttp.send();
  }

  fetchNotifications();

  setInterval(fetchNotifications, 20000);
}

window.onload = loadDoc;




$(function () {
  $("[data-search]").on("input", function () {
    const value = $(this).val().toLowerCase();
    $("[data-postsection]").each(function () {
      const postText = $(this).find("[data-postText]").text().toLowerCase();
      const username = $(this).find("h2").text().toLowerCase();
      const isVisible = postText.includes(value) || username.includes(value);
      $(this).toggleClass("hide", !isVisible);
    });
  });
});
