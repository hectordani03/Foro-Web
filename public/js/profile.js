const profile = {
  routes: {
    /* Views */
    home: "/",

    /* Controllers */
    userPosts: "/Profile/getPosts",
    userProfile: "/Profile/getUser",
  },

  up: $("#userPosts"),

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
            
            `;
          }
        }
        this.up.html(html);
      })
      .catch((err) => console.error("Error: ", err));
  },
  prof: $("#userProfile"),
  modal: $("#profileModalId"),

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
                          <div id="close" class="text-gray-400 w-8 h-8 transition-all cursor-pointer mt-5 mr-5">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                  <path class="fill-current" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                              </svg>
                          </div>
                      </header>
                      <section class="flex">
                      <form class="" id="updateUser-form" method="POST" autocomplete="off" enctype="multipart/form-data">
              
                              <h1 class="text-black flex justify-start w-full text-2xl font-bold mt-5 mb-5 ml-5 text-center dark:text-white">Upload your <span class="text-blue-500 ml-2">information</span></h1>
                            
                            <section class="flex gap-5">
                              <input name="username" id="usernamep" type="text" placeholder="New Username" class="border-b-2 border-t-1 border-gray-300 py-3 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-inherit bg-slate-200 dark:bg-slate-600 rounded-2 xl px-5 text-gray-400 font-semibold w-5/12 shadow-md rounded-xl" value="${user.username}"/>
          
                              <input name="email" id="emailp" type="email" placeholder="New Email" class="border-b-2 border-t-1 border-gray-300 py-3 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-inherit bg-slate-200 dark:bg-slate-600 rounded-2 xl px-5 text-gray-400 font-semibold w-5/12 shadow-md rounded-xl" value="${user.email}"/>
                            </section>
  
                            <section class="flex gap-5">
                                <input name="age" id="age" type="text" placeholder="Age" class="border-b-2 border-t-1 border-gray-300 py-3 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-inherit bg-slate-200 dark:bg-slate-600 rounded-2 xl px-5 text-gray-400 font-semibold w-5/12 mt-5 shadow-md rounded-xl" value="${user.age}" />
            
                                <input name="nacionality" id="nacionality" type="text" placeholder="Nacionality" class="border-b-2 border-t-1 border-gray-300 py-3 focus:border-b-2 focus:border-gray-400 transition-colors focus:outline-none bg-inherit bg-slate-200 dark:bg-slate-600 rounded-2 xl px-5 text-gray-400 font-semibold w-5/12 mt-5 shadow-md rounded-xl" value="${user.nacionality}" />
                            </section>
              
                              <textarea name="description" id="description" placeholder="Description" class="relative rounded-lg px-6 py-2 text-lg text-gray-400 bg-slate-200 dark:bg-slate-600 w-10/12 resize-none outline-none font-semibold mt-10 shadow-md mb-10" rows="7">${user.description}</textarea>
              
                              <button type="submit" onclick="profile.updateUser()" class="flex justify-center bg-sky-400 text-white font-3xl text-center w-3/12 mx-auto px-20 py-3 rounded-lg font-semibold mb-5">Upload</button>
                          </form>
                          <section class="w-6/12 flex flex-col items-center mt-10">
              
                              <h1 class="text-black flex justify-center w-full text-2xl font-bold mt-5 ml-5 mb-5 dark:text-white">Upload your profile<span class="text-blue-500 ml-2">image</span></h1>
              
                              <form class="" id="register-form" method="POST" autocomplete="off" enctype="multipart/form-data">

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
                                  <button type="submit" class="flex justify-center bg-sky-400 text-white font-3xl text-center w-3/12 mx-auto px-20 py-3 rounded-lg font-semibold mb-5 mt-5">Upload</button>
              
                              </form>
              
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
              
                      </section>
              
                  </section>
                `;

        this.modal.html(html);

        const capa = $("#capa");
        const close = $("#close");
        const body = $("#body-content");
        $("#body-content")
          .removeClass("overflow-hidden")
          .addClass("overflow-hidden");

        close.on("click", () => {
          modal.classList.add("hidden");
          capa.toggleClass("hidden");
          body.removeClass("overflow-hidden").addClass("overflow-auto");
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

  updateUser: function () {
    const uuf = $("#updateUser-form");
    uuf.on("submit", function (e) {
      e.preventDefault();
      e.stopPropagation();
      const data = new FormData(this);
      fetch(app.routes.updateUser + `/${app.user.id}`, {
        method: "POST",
        body: data,
      })
        .then((res) => res.json())
        .then((res) => {
          if (res.r !== false) {
            Swal.fire({
              icon: "success",
              text: "Changes made successfully",
            }).then(() => {
              location.href = app.routes.profile;
              uuf[0].reset();
            });
          } else {
            Swal.fire({
              icon: "error",
              text: "Unexpected error, please try again",
            }).then(() => {
              uuf[0].reset();
            });
          }
        })
        .then(() => {
          uuf[0].reset();
        })
        .catch((err) => {
          Swal.fire({
            icon: "error",
            text: "Unexpected error, please try again",
          }).then(() => {
            uuf[0].reset();
          });
        });
    });
  },
};
