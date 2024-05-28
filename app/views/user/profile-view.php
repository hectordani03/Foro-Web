<?php
require_once LAYOUTS_US . 'header.php';
?>
<div id="profileModalId" class="absolute z-50 flex justify-center w-full mx-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">

<!-- NOTIFICATIONS MODAL -->
<div id="notificationsId" class="absolute z-50 flex justify-center w-full mx-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
</div>

<div id="commentsId" class="absolute z-10 flex justify-center w-full mx-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
</div>
<div id="shareId" class="absolute z-10 flex justify-center w-full mx-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
</div>

</div>
<section class="w-full md:w-11/12 relative md:left-32 z-40">
    <!-- HEADER -->
    <header class="flex justify-between items-center sticky top-0 z-30 bg-white dark:bg-slate-800 pb-4">
        <h1 class="text-black flex justify-center w-full text-4xl font-bold mt-5 dark:text-white">FOR <span class="text-blue-500 ml-2">US</span></h1>

        <div class="flex gap-5">
            <div id="bell-icon" class="text-gray-400 w-9 h-9 mx-auto cursor-pointer mt-6 relative" onclick="app.notifications()">
                <svg id="bell-active"fill="#9ca3af" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56 56">
                    <path class="fill-current" d="M 9.4257 43.2461 L 46.5742 43.2461 C 48.8005 43.2461 50.1133 42.0977 50.1133 40.4102 C 50.1133 38.0664 47.7460 35.9570 45.7070 33.8711 C 44.1601 32.2539 43.7382 28.9258 43.5742 26.2305 C 43.3867 17.2305 41.0195 11.0195 34.7617 8.7695 C 33.8945 5.7226 31.4570 3.2852 28.0117 3.2852 C 24.5429 3.2852 22.1289 5.7226 21.2382 8.7695 C 15.0039 11.0195 12.6132 17.2305 12.4492 26.2305 C 12.2617 28.9258 11.8632 32.2539 10.2929 33.8711 C 8.2773 35.9570 5.8867 38.0664 5.8867 40.4102 C 5.8867 42.0977 7.2226 43.2461 9.4257 43.2461 Z M 20.8632 46.4336 C 21.1445 49.8555 24.0273 52.7148 28.0117 52.7148 C 31.9726 52.7148 34.8554 49.8555 35.1601 46.4336 Z"></path>
                </svg>
                <div id="userNotifications" class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900"></div>
            </div>

            <!-- CAMBIO ESTEBAN -->
            <?php if (isset($ua->sv) && $ua->sv) { ?>
            <a href="/profile">
                    <img class="w-11 h-10 bg-blue-500 rounded-full mr-10 mt-5" src="<?= PROF_IMG; echo $ua->profilePic; ?>" alt="">
            </a>
            <?php } ?>
        </div>

    </header>
    <main id="background" class="bg-gradient-to-b <?= $ua->background_color ?> rounded-xl w-12/12 h-80 xl:mr-5 lg:mr-14 md:mr-20 mr-5 ml-5 relative">
        <section class="relative -bottom-64 sm:-bottom-72 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 place-items-center w-full h-auto z-20 mx-auto">
            <img class="min-w-52 max-w-52 min-h-52 max-h-52 bg-blue-500 rounded-full mr-10 mt-5 relative bottom-16 ml-10 sm:ml-0" src="<?php echo PROF_IMG;echo $ua->profilePic; ?>" alt="">

            <div class="relative flex flex-col text-center justify-start w-full mr-20 mb-5 mx-auto">
                <h1 class="text-3xl font-bold text-gray-600 mb-5 dark:text-white"><?= $ua->username ?></h1>
                <p class=" text-gray-400 font-normal text-center dark:text-white"><?= $ua->description ?></p>
                <div class="flex gap-3 mt-5 justify-center">
                    <div class="bg-sky-400 rounded-full py-1">
                        <span class="text-white font-semibold px-5"><?= $ua->age ?></span>
                    </div>
                    <div class="bg-sky-400 rounded-full py-1">
                        <span class="text-white font-semibold px-5"><?= $ua->nacionality ?></span>
                    </div>
                    <!-- <div class="bg-sky-400 rounded-full py-1">
                        <span class="text-white font-semibold px-5">Pacifist</span>
                    </div> -->
                </div>
            </div>
            <div id="userCat" class="relative w-9/12 h-32 rounded-xl flex justify-center shadow-lg gap-5 flex-wrap overflow-auto">
          
            </div>


            <div id="userProfile" class="rounded-lg relative flex shadow-xl h-fit sm:w-8/12 gap-5 items-center justify-center mr-10 cursor-pointer dark:bg-slate-700 mt-5 sm:mt-0 w-5/12" onclick="profile.userProfile()">
                <div class="text-gray-400 w-12 h-12 transition-all cursor-pointer ml-10 mt-2 pt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path class="fill-current" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                    </svg>
                </div>
                <span class="w-full text-gray-400 font-semibold text-lg">Edit Profile</span>
            </div>

        </section>
    </main>
    <div class="relative -bottom-96 sm:-bottom-56 h-auto flex flex-col mt-32 lg:mt-10 xl:mt-0">
        <hr class="w-full mt-5 border dark:border-slate-700">
        <div class="flex gap-16 justify-center mt-5 mb-10">
            <a href="#" id="userPosts" class="link-underline text-gray-400 font-semibold text-xl">Posts</a>
            <a href="#" id="userComments" class="link-underline text-gray-400 font-semibold text-xl">Comments</a>
            <a href="#" id="userSharedPosts" class="link-underline text-gray-400 font-semibold text-xl">Shared</a>
        </div>

        <!-- IF THERE'S NO CONTENT -->
        <div id="userprofPosts" class="w-10/12 mx-auto">

        </div>
    </div>
</section>
<?php
require_once LAYOUTS_US . 'footer.php';
setFooter($d,"profile")
?>
<script>
    $(function() {
        app.categories();
        profile.userPosts();
        profile.userCat();
    });

    const underlineLinks = document.querySelectorAll('.link-underline');
    // let arrayConv = Array.prototype.slice.call(underlineLinks)
    underlineLinks.forEach(link => {
        link.addEventListener('click', e => {
            e.preventDefault();
            underlineLinks.forEach(otherLink => {
                if (otherLink !== link) {
                    otherLink.classList.remove('underline')
                    otherLink.classList.remove('decoration-4')
                    otherLink.classList.remove('decoration-sky-500')
                    otherLink.classList.remove('underline-offset-4')
                } else {
                    link.classList.add('underline');
                    link.classList.add('decoration-4');
                    link.classList.add('decoration-sky-500');
                    link.classList.add('underline-offset-4');
                }
            })
        });

    });
</script>

<script>
//     document.addEventListener('DOMContentLoaded', function() {
//     const background = document.getElementById('background');
//     const savedColor = localStorage.getItem('selectedColor');
    
//     if (savedColor) {
//       background.classList.remove('from-gray-100');
//       background.classList.add(savedColor);
//     }
//   });

  </script>

  <script>

    document.addEventListener("DOMContentLoaded", e =>{
        setTimeout(()=>{
            const profPost = document.querySelector("#userprofPosts");
            const profPostSvg = document.querySelectorAll("#userprofPosts #post-footer");
            const profPostHash = document.querySelectorAll("#userprofPosts #hashtag-container");

            profPostSvg.forEach(svg => {
            if (svg.childNodes.length > 0) {
                svg.classList.add("hidden");

                profPostHash.forEach(hash => {
                hash.classList.add("mb-6");
                });
            }
            });
        },300)
    })

    document.addEventListener("DOMContentLoaded", e =>{
        const $header = document.querySelector("header");

        window.addEventListener("scroll", e =>{
            window.pageYOffset > 10 ? $header.classList.add("shadow-2xl") : $header.classList.remove("shadow-2xl")
        })
    })

  </script>