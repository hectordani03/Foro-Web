const profile = {
  routes: {
    /* Views */
    home: "http://forus.com/",
    profile: "/profile",

    /* Controllers */
    userPosts: "/Profile/getPosts",
    userComts: "/Profile/getComts",
    userProfile: "/Profile/getUser",
    updateUser: "/Profile/updateUser",
  },

  up: $("#userprofPosts"),
  prof: $("#userProfile"),
  modal: $("#profileModalId"),

  userPosts: function () {
    let html = `
    <div class=" relative top-32">
    <svg class="w-52 h-auto mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path class="fill-gray-400 dark:fill-gray-500" d="M192 104.8c0-9.2-5.8-17.3-13.2-22.8C167.2 73.3 160 61.3 160 48c0-26.5 28.7-48 64-48s64 21.5 64 48c0 13.3-7.2 25.3-18.8 34c-7.4 5.5-13.2 13.6-13.2 22.8c0 12.8 10.4 23.2 23.2 23.2H336c26.5 0 48 21.5 48 48v56.8c0 12.8 10.4 23.2 23.2 23.2c9.2 0 17.3-5.8 22.8-13.2c8.7-11.6 20.7-18.8 34-18.8c26.5 0 48 28.7 48 64s-21.5 64-48 64c-13.3 0-25.3-7.2-34-18.8c-5.5-7.4-13.6-13.2-22.8-13.2c-12.8 0-23.2 10.4-23.2 23.2V464c0 26.5-21.5 48-48 48H279.2c-12.8 0-23.2-10.4-23.2-23.2c0-9.2 5.8-17.3 13.2-22.8c11.6-8.7 18.8-20.7 18.8-34c0-26.5-28.7-48-64-48s-64 21.5-64 48c0 13.3 7.2 25.3 18.8 34c7.4 5.5 13.2 13.6 13.2 22.8c0 12.8-10.4 23.2-23.2 23.2H48c-26.5 0-48-21.5-48-48V343.2C0 330.4 10.4 320 23.2 320c9.2 0 17.3 5.8 22.8 13.2C54.7 344.8 66.7 352 80 352c26.5 0 48-28.7 48-64s-21.5-64-48-64c-13.3 0-25.3 7.2-34 18.8C40.5 250.2 32.4 256 23.2 256C10.4 256 0 245.6 0 232.8V176c0-26.5 21.5-48 48-48H168.8c12.8 0 23.2-10.4 23.2-23.2z" />
    </svg>
    <h1 class="text-4xl font-bold text-gray-400 dark:text-gray-500 text-center w-6/12 mx-auto mt-5">
        No content to display
    </h1>
</div>
    `;
    this.up.html("");
    fetch(this.routes.userPosts + `/${app.user.id}`)
      .then((res) => res.json())
      .then((posts) => {
        if (posts.length > 0) {
          html = "";
          for (let post of posts) {
            html += `
            <div class="post">
            <div class="bg-gray-100 dark:bg-slate-700 shadow-lg w-full rounded-xl flex flex-col relative mt-5 h-fit self-start opacity-100">
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
            <div class="absolute right-5 top-0">
                <span id="menu-card" class="text-5xl text-gray-400 cursor-pointer select-none">...</span>
            </div>
        </div>
  
        <p class="text-gray-400 w-10/12 mx-auto text-xl mt-8">${post.text}</p>
  
        <img class="w-10/12 mx-auto rounded-xl mt-7" src="http://forus.com/resources/assets/img/post/${
          post.img
        }" alt="">
  
        <div class="flex gap-4 w-10/12 mx-auto mt-5">
            <a class="text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center" href="">#${
              post.category
            }</a>
        </div>
  
        <div class="flex w-10/12 relative mt-10 mb-5 mx-auto">
            <div id="" class="text-gray-400 w-8 h-8 transition-all cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path class="fill-current" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                </svg>
            </div>
            <div id="comment-button" onclick="app.postComments(${
              post.id
            });" class="text-gray-400 w-7 h-7 ml-5 mt-1 cursor-pointer comment-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path class="fill-current" d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64h96v80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416H448c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64z" />
                </svg>
            </div>
            <div id="share-button" onclick="app.sharePost(${
              post.id
            })" class="text-gray-400 w-8 h-8 absolute right-3 cursor-pointer share-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path class="fill-current" d="M307 34.8c-11.5 5.1-19 16.6-19 29.2v64H176C78.8 128 0 206.8 0 304C0 417.3 81.5 467.9 100.2 478.1c2.5 1.4 5.3 1.9 8.1 1.9c10.9 0 19.7-8.9 19.7-19.7c0-7.5-4.3-14.4-9.8-19.5C108.8 431.9 96 414.4 96 384c0-53 43-96 96-96h96v64c0 12.6 7.4 24.1 19 29.2s25 3 34.4-5.4l160-144c6.7-6.1 10.6-14.7 10.6-23.8s-3.8-17.7-10.6-23.8l-160-144c-9.4-8.5-22.9-10.6-34.4-5.4z" />
                </svg>
            </div>
        </div>
        </div>
        </div>
                  `;
          }
        }
        this.up.html(html);
      })
      .catch((err) => console.error("Error: ", err));
  },

  userProfile: function () {
    let html = ``;
    this.modal.html("");
    fetch(this.routes.userProfile + `/${app.user.id}`)
      .then((res) => res.json())
      .then((u) => {
        const user = u[0];
        html += `
              <div id="capa" class="fixed inset-0 bg-gray-500 bg-opacity-40 transition-opacity"></div>
                  <section id="modal" class="bg-gray-100 dark:bg-slate-700 rounded-xl w-8/12 2xl:w-8/12 mx-auto relative mt-10 h-fit">
                      <header class="flex">
                          <h1 class="text-black flex justify-start w-full text-2xl font-bold mt-5 ml-5 dark:text-white">FOR <span class="text-blue-500 ml-2">US</span></h1>
                          <div id="close" class="text-gray-400 w-8 h-8 transition-all cursor-pointer mt-5 mr-5 close-modal">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                  <path class="fill-current" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                              </svg>
                          </div>
                      </header>
                      <section class="flex">
                      <form class="" id="updateUser-form" method="POST" autocomplete="off" enctype="multipart/form-data">

                              <h1 class="text-black flex justify-start w-full text-2xl font-bold mt-5 mb-5 ml-5 text-center dark:text-white">Upload your <span class="text-blue-500 ml-2">information</span></h1>

                            <section class="flex gap-5">
                              <input name="username" id="usernamep" type="text" placeholder="New Username" class="border-b-2 border-t-1 border-gray-300 py-3 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-inherit bg-slate-200 dark:bg-slate-600 rounded-2 xl px-5 text-gray-400 font-semibold w-5/12 shadow-md rounded-xl" value="${
                                user.username
                              }"/>
          
                              <input name="email" id="emailp" type="email" placeholder="New Email" class="border-b-2 border-t-1 border-gray-300 py-3 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-inherit bg-slate-200 dark:bg-slate-600 rounded-2 xl px-5 text-gray-400 font-semibold w-5/12 shadow-md rounded-xl" value="${
                                user.email
                              }"/>
                            </section>
  
                            <section class="flex gap-5">
                                <input name="age" id="age" type="text" placeholder="Age" class="border-b-2 border-t-1 border-gray-300 py-3 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-inherit bg-slate-200 dark:bg-slate-600 rounded-2 xl px-5 text-gray-400 font-semibold w-5/12 mt-5 shadow-md rounded-xl" ${
                                  user.age != null && user.age !== 0
                                    ? 'value="' + user.age + '"'
                                    : ""
                                } />
            
                                <input name="nacionality" id="nacionality" type="text" placeholder="Nacionality" class="border-b-2 border-t-1 border-gray-300 py-3 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-inherit bg-slate-200 dark:bg-slate-600 rounded-2 xl px-5 text-gray-400 font-semibold w-5/12 mt-5 shadow-md rounded-xl" ${
                                  user.nacionality !== null
                                    ? 'value="' + user.nacionality + '"'
                                    : ""
                                } />
                            </section>
              
                              <textarea name="description" id="description" placeholder="Description" class="relative rounded-lg px-6 py-2 text-lg text-gray-400 bg-slate-200 dark:bg-slate-600 w-10/12 resize-none outline-none font-semibold mt-10 shadow-md mb-10" rows="7">${
                                user.description !== null
                                  ? user.description
                                  : ""
                              }</textarea>
              
                          <section class="w-6/12 flex flex-col items-center mt-10">
              
                              <h1 class="text-black flex justify-center w-full text-2xl font-bold mt-5 ml-5 mb-5 dark:text-white">Upload your profile<span class="text-blue-500 ml-2">image</span></h1>
              

                                  <label for="profilePic" id="drop-area" class="mt-5 mb-5 w-9/12">
                                      <div id="img-view" class="p-2 rounded-md text-center mt-3 mb-3">
                                  <div class="w-8/12 shadow-lg mx-auto h-fit rounded-xl bg-slate-200 dark:bg-slate-600 py-5">
                                      <div class="border-2 border-dashed border-blue-500 w-7/12 mx-auto text-center flex flex-col justify-center items-center rounded-xl h-40 hover:border-gray-400 transition-colors">
                                                  <input type="file" id="profilePic" name="profilePic" accept=".jpg, .png, .jpeg" hidden>
                                                  <svg class="w-20 h-20 mt-5 mx-auto cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                      <path class="fill-blue-500 hover:fill-gray-400 transition-colors" class="fill-current" d="M144 480C64.5 480 0 415.5 0 336c0-62.8 40.2-116.2 96.2-135.9c-.1-2.7-.2-5.4-.2-8.1c0-88.4 71.6-160 160-160c59.3 0 111 32.2 138.7 80.2C409.9 102 428.3 96 448 96c53 0 96 43 96 96c0 12.2-2.3 23.8-6.4 34.6C596 238.4 640 290.1 640 352c0 70.7-57.3 128-128 128H144zm79-217c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V392c0 13.3 10.7 24 24 24s24-10.7 24-24V257.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-9.4-9.4-24.6-9.4-33.9 0l-80 80z" />
                                                  </svg>
              
                                                  <h1 class="text-black flex justify-center w-full text-xs font-bold mt-1 dark:text-white">Drag File Here To Upload</h1>
              
                                                  <h2 class="text-blue-500 flex justify-center w-full font-bold mb-10" style="font-size: 10px;">Max File Size 5mb</h2>
                                                  </div>
                                                  </div>
                                                  </div>
                                              </label>              
                                              <button type="submit" onclick="profile.updateUser()" id="updatebtn" class="flex justify-center bg-sky-400 text-white font-3xl text-center w-3/12 mx-auto px-20 py-3 rounded-lg font-semibold mb-5">Upload</button>

                              <div class="w-7/12 mt-5">
                                  <h1 class="text-black flex justify-center w-full text-2xl font-bold mt-5 dark:text-white">Choose your<span class="text-blue-500 ml-2">Color</span></h1>
              
                                  <div class="w-12/12 relative h-28 2xl:h-32 shadow-xl mt-5 rounded-xl flex mb-10 ">
                                      <div id="red" class="relative bg-red-500 w-4/12 h-full rounded-l-lg hover:scale-110">
              
                                      </div>
                                      <div id="green" class="relative bg-green-400 w-4/12 h-full hover:scale-110">
              
                                      </div>
                                      <div id="blue" class="relative bg-sky-500 w-4/12 h-full hover:scale-110">
              
                                      </div>
                                      <div id="yellow" class="relative bg-yellow-300 w-4/12 h-full hover:scale-110">
              
                                      </div>
                                      <div id="purple" class="relative bg-purple-500 w-4/12 h-full hover:scale-110">
              
                                      </div>
                                      <div id="fuchsia" class="relative bg-fuchsia-400 w-4/12 h-full hover:scale-110">
              
                                      </div>
                                      <div id="orange" class="relative bg-orange-400 w-4/12 h-full hover:scale-110">
              
                                      </div>
                                      <div id="gray" class="relative bg-gray-300 w-4/12 h-full hover:scale-110">
              
                                      </div>
                                      <div id="black" class="relative bg-black w-4/12 h-full hover:scale-110">
              
                                      </div>
                                      <div id="white" class="relative bg-white w-4/12 h-full rounded-r-lg hover:scale-110">
              
                                      </div>
              
              
                                  </div>
              
                              </div>
                          </section>
                          </form>

                      </section>
              
                  </section>
                `;

        this.modal.html(html);
        this.modal.on("click", function (e) {
          e.stopPropagation();
        });
        $(function () {
          $("body").removeClass("overflow-auto").addClass("overflow-hidden");
        });
        const capa = $("#capa");
        const close = $(".close-modal");
        close.on("click", () => {
          modal.classList.add("hidden");
          capa.toggleClass("hidden");
          $("body").removeClass("overflow-hidden").addClass("overflow-auto");
        });

        const background = document.getElementById("background");
        const backgroundClasses = background.classList;
        const red = $("#red");
        const green = $("#green");
        const blue = $("#blue");
        const yellow = $("#yellow");
        const purple = $("#purple");
        const fuchsia = $("#fuchsia");
        const orange = $("#orange");
        const gray = $("#gray");
        const black = $("#black");
        const white = $("#white");

        function saveColorToLocalStorage(color) {
          localStorage.setItem("selectedColor", color);
        }

        function loadColorFromLocalStorage() {
          const savedColor = localStorage.getItem("selectedColor");
          if (savedColor) {
            backgroundClasses.replace(backgroundClasses.item(1), savedColor);
          }
        }

        loadColorFromLocalStorage();

        function changeBackgroundColor(colorClass) {
          backgroundClasses.replace(backgroundClasses.item(1), colorClass);
          saveColorToLocalStorage(colorClass);
        }

        red.on("click", () => changeBackgroundColor("from-red-400"));
        green.on("click", () => changeBackgroundColor("from-green-400"));
        blue.on("click", () => changeBackgroundColor("from-sky-400"));
        yellow.on("click", () => changeBackgroundColor("from-yellow-400"));
        purple.on("click", () => changeBackgroundColor("from-purple-400"));
        fuchsia.on("click", () => changeBackgroundColor("from-fuchsia-400"));
        orange.on("click", () => changeBackgroundColor("from-orange-400"));
        gray.on("click", () => changeBackgroundColor("from-gray-400"));
        black.on("click", () => changeBackgroundColor("from-black"));
        white.on("click", () => changeBackgroundColor("from-gray-100"));
      })
      .catch((err) => console.error("Error: ", err));
  },

  userComts: function () {
    let html = `
    <div class=" relative top-32">
    <svg class="w-52 h-auto mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path class="fill-gray-400 dark:fill-gray-500" d="M192 104.8c0-9.2-5.8-17.3-13.2-22.8C167.2 73.3 160 61.3 160 48c0-26.5 28.7-48 64-48s64 21.5 64 48c0 13.3-7.2 25.3-18.8 34c-7.4 5.5-13.2 13.6-13.2 22.8c0 12.8 10.4 23.2 23.2 23.2H336c26.5 0 48 21.5 48 48v56.8c0 12.8 10.4 23.2 23.2 23.2c9.2 0 17.3-5.8 22.8-13.2c8.7-11.6 20.7-18.8 34-18.8c26.5 0 48 28.7 48 64s-21.5 64-48 64c-13.3 0-25.3-7.2-34-18.8c-5.5-7.4-13.6-13.2-22.8-13.2c-12.8 0-23.2 10.4-23.2 23.2V464c0 26.5-21.5 48-48 48H279.2c-12.8 0-23.2-10.4-23.2-23.2c0-9.2 5.8-17.3 13.2-22.8c11.6-8.7 18.8-20.7 18.8-34c0-26.5-28.7-48-64-48s-64 21.5-64 48c0 13.3 7.2 25.3 18.8 34c7.4 5.5 13.2 13.6 13.2 22.8c0 12.8-10.4 23.2-23.2 23.2H48c-26.5 0-48-21.5-48-48V343.2C0 330.4 10.4 320 23.2 320c9.2 0 17.3 5.8 22.8 13.2C54.7 344.8 66.7 352 80 352c26.5 0 48-28.7 48-64s-21.5-64-48-64c-13.3 0-25.3 7.2-34 18.8C40.5 250.2 32.4 256 23.2 256C10.4 256 0 245.6 0 232.8V176c0-26.5 21.5-48 48-48H168.8c12.8 0 23.2-10.4 23.2-23.2z" />
    </svg>
    <h1 class="text-4xl font-bold text-gray-400 dark:text-gray-500 text-center w-6/12 mx-auto mt-5">
        No comments to display yet
    </h1>
</div>
    `;
    this.up.html("");
    fetch(this.routes.userComts + `/${app.user.id}`)
      .then((res) => res.json())
      .then((posts) => {
        let commentsByPost = {};

        for (let post of posts) {
          if (posts.length > 0) {
            html = "";
          }
          if (!commentsByPost[post.id]) {
            commentsByPost[post.id] = [];
          }
          commentsByPost[post.id].push(post);
        }
        for (let postId in commentsByPost) {
          let postComments = commentsByPost[postId];
          const post = postComments[0];
          html += `
                <div class="post">
                <div class="bg-gray-100 dark:bg-slate-700 shadow-lg w-full rounded-xl flex flex-col relative mt-5 h-fit self-start opacity-100">
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
                <div class="absolute right-5 top-0">
                    <span id="menu-card" class="text-5xl text-gray-400 cursor-pointer select-none">...</span>
                </div>
            </div>
      
            <p class="text-gray-400 w-10/12 mx-auto text-xl mt-8">${
              post.text
            }</p>
      
            <img class="w-10/12 mx-auto rounded-xl mt-7" src="http://forus.com/resources/assets/img/post/${
              post.img
            }" alt="">
      
            <div class="flex gap-4 w-10/12 mx-auto mt-5">
                <a class="text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center" href="">#${
                  post.category
                }</a>
            </div>
      
            <div class="flex w-10/12 relative mt-10 mb-5 mx-auto">
                <div id="" class="text-gray-400 w-8 h-8 transition-all cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path class="fill-current" d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z" />
                    </svg>
                </div>
                <div id="comment-button" onclick="app.postComments(${
                  post.id
                });" class="text-gray-400 w-7 h-7 ml-5 mt-1 cursor-pointer comment-button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path class="fill-current" d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64h96v80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416H448c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64z" />
                    </svg>
                </div>
                <div id="share-button" onclick="app.sharePost(${
                  post.id
                })" class="text-gray-400 w-8 h-8 absolute right-3 cursor-pointer share-button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path class="fill-current" d="M307 34.8c-11.5 5.1-19 16.6-19 29.2v64H176C78.8 128 0 206.8 0 304C0 417.3 81.5 467.9 100.2 478.1c2.5 1.4 5.3 1.9 8.1 1.9c10.9 0 19.7-8.9 19.7-19.7c0-7.5-4.3-14.4-9.8-19.5C108.8 431.9 96 414.4 96 384c0-53 43-96 96-96h96v64c0 12.6 7.4 24.1 19 29.2s25 3 34.4-5.4l160-144c6.7-6.1 10.6-14.7 10.6-23.8s-3.8-17.7-10.6-23.8l-160-144c-9.4-8.5-22.9-10.6-34.4-5.4z" />
                    </svg>
                </div>
            </div>
            </div>
            </div>
                `;
          postComments.forEach((comment) => {
            html += `
                    <hr class="w-full mt-5 border dark:border-slate-600">
                    <div class="w-10/12 mx-auto mb-24">
                        <div class="flex gap-5 mt-10">
                          <img class="w-12 h-10 bg-blue-500 rounded-full top-8 left-8" src="http://forus.com/resources/assets/img/profile/${app.user.pic}" alt="">
                          <div class="rounded-xl bg-gray-200 dark:bg-slate-600 shadow-lg">
                              <div class="ml-5 mr-5 mt-1 mb-2">
                                  <p class="text-gray-400 font-bold">${app.user.username}</p>
                                  <span class="text-gray-400">${comment.content}</span>
                              </div>
                          </div>
                        </div>
                    </div>
                    <hr class="w-full mt-5 border dark:border-slate-600">
                                `;
          });
        }

        this.up.html(html);
      })
      .catch((err) => console.error("Error: ", err));
  },

  updateUser: function () {
    const uuf = $("#updateUser-form");
    uuf.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      uuf.find('button[type="submit"]').prop("disabled", true);
      const us = $("#usernamep");
      const em = $("#emailp");
      const file = $("#profilePic")[0].files[0];
      const data = new FormData(this);

      if (us.val() === "" || em.val() === "") {
        alerts({
          type: "function",
          icon: "error",
          text: "Fields can not be empty",
          callback: function () {
            e.preventDefault();
            uuf.find('button[type="submit"]').prop("disabled", false);
          },
        });
      } else if (file && file.size / (1024 * 1024) > 2) {
        alerts({
          type: "function",
          icon: "error",
          text: "The image you have selected exceeds the allowed weight 2 MB.",
          callback: function () {
            e.preventDefault();
            uuf.find('button[type="submit"]').prop("disabled", false);
          },
        });
      } else {
        fetch(profile.routes.updateUser, {
          method: "POST",
          body: data,
        })
          .then((res) => res.json())
          .then((res) => {
            if (res.r === true) {
              alerts({
                type: "function",
                text: "Changes made successfully",
                icon: "success",
                callback: function () {
                  location.reload();
                },
              });
            } else if (res.r === "r") {
              alerts({
                type: "function",
                icon: "error",
                text: "The EMAIL you just entered is already registered in the system, please check and try again",
                callback: function () {
                  uuf.find('button[type="submit"]').prop("disabled", false);
                },
              });
            } else if (res.r === "e") {
              alerts({
                type: "function",
                icon: "error",
                text: "Filds can not be empty",
                callback: function () {
                  uuf.find('button[type="submit"]').prop("disabled", false);
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
};

$("#userComments").on("click", function () {
  $(function () {
    profile.userComts();
  });
});

$("#userPosts").on("click", function () {
  $(function () {
    profile.userPosts();
  });
});
