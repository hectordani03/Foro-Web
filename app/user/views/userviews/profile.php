<?php
$query = $model->run_query("SELECT * FROM user LEFT JOIN userinfo ON user.id_user = userinfo.id_userinfo WHERE user.id_user = '{$_SESSION['id']}' ");
$data = $query->fetch();
?>
<div id="profileModalId" class="absolute z-50 flex justify-center w-full mx-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
</div>
<section class="w-11/12 relative left-32 z-40">
    <!-- HEADER -->
    <header class="flex justify-between items-center mb-7">
        <h1 class="text-black flex justify-center w-full text-3xl font-bold mt-5 dark:text-white">FOR <span class="text-blue-500 ml-2">US</span></h1>
        <img class="w-11 h-10 bg-blue-500 rounded-full mr-10 mt-5" src="<?php echo APP_URL; ?>assets/profile_picture/<?php echo $data['profile_picture']; ?>" alt="">
    </header>
    <main id="background" class="bg-gradient-to-b from-gray-100 rounded-xl w-12/12 h-80 mr-5 ml-5 relative">
        <section class="absolute -bottom-56 left-10 z-50 flex">
            <img class="min-w-52 max-w-52 min-h-52 max-h-52 bg-blue-500 rounded-full mr-10 mt-5" src="<?php echo APP_URL; ?>assets/profile_picture/<?php echo $data['profile_picture']; ?>" alt="">

            <div class="relative -bottom-20 flex flex-col text-center justify-start w-3/12">
                <h1 class="text-3xl font-bold text-gray-600 mb-5 dark:text-white"><?php echo $data['username']; ?></h1>
                <p class=" text-gray-400 font-normal text-center dark:text-white">"<?php echo $data['description']; ?>"</p>
                <div class="flex gap-3 mt-5 justify-center">
                    <div class="bg-sky-400 rounded-full py-1">
                        <span class="text-white font-semibold px-5"><?php echo $data['age']; ?></span>
                    </div>
                    <div class="bg-sky-400 rounded-full py-1">
                        <span class="text-white font-semibold px-5"><?php echo $data['nacionality']; ?></span>
                    </div>
                    <!-- <div class="bg-sky-400 rounded-full py-1">
                        <span class="text-white font-semibold px-5">Pacifist</span>
                    </div> -->
                </div>
            </div>
            <div class="relative -bottom-32 flex w-4/12 ml-10 gap-5 flex-wrap h-fit mr-10">
                <span class="text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center h-fit" href="">#NoMoreHunger</span>
                <span class="text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center h-fit" href="">#EndIt</span>
                <span class="text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center h-fit" href="">#NoMoreHunger</span>
                <span class="text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center h-fit" href="">#EndIt</span>
                <span class="text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center h-fit" href="">#NoMoreHunger</span>
                <span class="text-white font-bold bg-gray-400 dark:bg-gray-500 rounded-full px-4 py-1 text-center h-fit" href="">#EndIt</span>
            </div>
            <div id="edit-profile" class="rounded-lg relative -bottom-32 flex shadow-xl h-fit w-2/12 gap-5 items-center justify-center mr-5 cursor-pointer dark:bg-slate-700">
                <div class="text-gray-400 w-12 h-12 transition-all cursor-pointer ml-10 mt-2 pt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path class="fill-current" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                    </svg>
                </div>
                <span class="w-full text-gray-400 font-semibold text-lg">Edit Profile</span>
            </div>
        </section>
    </main>
    <div class="relative -bottom-80 h-auto flex flex-col">
        <hr class="w-full mt-5 border dark:border-slate-700">
        <div class="flex gap-16 justify-center mt-5 mb-10">
            <a href="#" class="link-underline text-gray-400 font-semibold text-xl">Posts</a>
            <a href="#" class="link-underline text-gray-400 font-semibold text-xl">Likes</a>
            <a href="#" class="link-underline text-gray-400 font-semibold text-xl">Shared</a>
            <a href="#" class="link-underline text-gray-400 font-semibold text-xl">Comments</a>
        </div>


        <!-- IF THERE'S NO CONTENT -->
        <div class=" relative top-32">
            <svg class="w-52 h-auto mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path class="fill-gray-400 dark:fill-gray-500" d="M192 104.8c0-9.2-5.8-17.3-13.2-22.8C167.2 73.3 160 61.3 160 48c0-26.5 28.7-48 64-48s64 21.5 64 48c0 13.3-7.2 25.3-18.8 34c-7.4 5.5-13.2 13.6-13.2 22.8c0 12.8 10.4 23.2 23.2 23.2H336c26.5 0 48 21.5 48 48v56.8c0 12.8 10.4 23.2 23.2 23.2c9.2 0 17.3-5.8 22.8-13.2c8.7-11.6 20.7-18.8 34-18.8c26.5 0 48 28.7 48 64s-21.5 64-48 64c-13.3 0-25.3-7.2-34-18.8c-5.5-7.4-13.6-13.2-22.8-13.2c-12.8 0-23.2 10.4-23.2 23.2V464c0 26.5-21.5 48-48 48H279.2c-12.8 0-23.2-10.4-23.2-23.2c0-9.2 5.8-17.3 13.2-22.8c11.6-8.7 18.8-20.7 18.8-34c0-26.5-28.7-48-64-48s-64 21.5-64 48c0 13.3 7.2 25.3 18.8 34c7.4 5.5 13.2 13.6 13.2 22.8c0 12.8-10.4 23.2-23.2 23.2H48c-26.5 0-48-21.5-48-48V343.2C0 330.4 10.4 320 23.2 320c9.2 0 17.3 5.8 22.8 13.2C54.7 344.8 66.7 352 80 352c26.5 0 48-28.7 48-64s-21.5-64-48-64c-13.3 0-25.3 7.2-34 18.8C40.5 250.2 32.4 256 23.2 256C10.4 256 0 245.6 0 232.8V176c0-26.5 21.5-48 48-48H168.8c12.8 0 23.2-10.4 23.2-23.2z"/></svg>
            <h1 class="text-4xl font-bold text-gray-400 dark:text-gray-500 text-center w-6/12 mx-auto mt-5">No content to display</h1>
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
    <script>
        var currentUser = {
            id: <?php echo json_encode($_SESSION['id']); ?>,
            username: <?php echo json_encode($_SESSION['username']); ?>,
            email: <?php echo json_encode($_SESSION['email']); ?>,
            age: <?php echo json_encode($_SESSION['age']); ?>,
            nacionality: <?php echo json_encode($_SESSION['nacionality']); ?>,
            description: <?php echo json_encode($_SESSION['description']); ?>
        };

        
    </script>
</section>