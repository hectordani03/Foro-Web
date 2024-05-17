<?php
require_once LAYOUTS_US . 'header.php';
?>
<div id="profileModalId" class="absolute z-50 flex justify-center w-full mx-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">

</div>
<section class="w-11/12 md:w-10/12 relative md:left-32 z-40">
    <!-- HEADER -->
    <header class="flex justify-between items-center mb-7">
        <h1 class="text-black flex justify-center w-full text-3xl font-bold mt-5 dark:text-white">FOR <span class="text-blue-500 ml-2">US</span></h1>
        <img class="w-11 h-10 bg-blue-500 rounded-full mr-10 mt-5" src="<?php echo PROF_IMG;echo $ua->profilePic; ?>" alt="">
    </header>
    <main id="background" class="bg-gradient-to-b from-gray-100 rounded-xl w-12/12 h-80 mr-5 ml-5 relative">
        <section class="relative -bottom-72 z-50 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 place-items-center w-full h-auto">
            <img class="min-w-52 max-w-52 min-h-52 max-h-52 bg-blue-500 rounded-full mr-10 mt-5 relative bottom-16" src="<?php echo PROF_IMG;echo $ua->profilePic; ?>" alt="">

            <div class="relative flex flex-col text-center justify-start w-full mr-20 mb-5">
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
            <div class="relative flex w-full ml-10 gap-5 flex-wrap h-fit">
                <span class="text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center h-fit" href="">#NoMoreHunger</span>
                <span class="text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center h-fit" href="">#EndIt</span>
                <span class="text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center h-fit" href="">#NoMoreHunger</span>
                <span class="text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center h-fit" href="">#EndIt</span>
                <span class="text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center h-fit" href="">#NoMoreHunger</span>
                <span class="text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center h-fit" href="">#EndIt</span>
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
            <a href="#" class="link-underline text-gray-400 font-semibold text-xl">Posts</a>
            <a href="#" class="link-underline text-gray-400 font-semibold text-xl">Likes</a>
            <a href="#" class="link-underline text-gray-400 font-semibold text-xl">Shared</a>
            <a href="#" class="link-underline text-gray-400 font-semibold text-xl">Comments</a>
        </div>


        <!-- IF THERE'S NO CONTENT -->
        <div id="userPosts">

        </div>
    </div>
    <script>
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

</section>

<?php
setFooter($d, "sweetalert2.all.min", "alerts", "jquery", "contentPolicy", "navbarUser", "app","profile");
?>

<script>
    $(function() {
        app.user.sv = <?= $ua->sv ? 'true' : 'false' ?>;
        app.user.id = <?= $ua->id ?? '""' ?>;
        app.user.username = "<?= $ua->username ?? '' ?>";
        app.user.role = "<?= $ua->role ?? '' ?>";
        app.user.pic = "<?= $ua->profilePic ?? '' ?>";
        app.user.csrf = <?= $ua->csrf ?? '""' ?>;
    });
</script>
<script>
    $(function() {
        profile.userPosts();
    });
</script>
<?php
closeFooter();
?>