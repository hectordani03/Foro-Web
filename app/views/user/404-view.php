<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Walking Animation</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.tailwindcss.com"></script>


  <style>
    /* style.css */
body {
  margin: 0;
  overflow: hidden;
}

.walking-person {
  position: relative;
  bottom: 0;
  width: 100%;
  height: 1000px; /* Ajusta la altura según sea necesario */
}

.walking-person img {
  position: relative;
  bottom: 0;
  width: 348px; /* Ajusta el ancho según el tamaño del GIF */
  height: 680px;
  animation: walk-cycle 4s linear infinite;
}

@keyframes walk-cycle {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(150%);
  }
}

@media (max-width: 1550px) {
  @keyframes walk-cycle {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(120%);
  }
}

}

@media (max-width: 1398px) {
  @keyframes walk-cycle {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(100%);
  }
}

}


@media (max-width: 1300px) {
  @keyframes walk-cycle {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(70%);
  }
}

}

@media (max-width: 1180px) {
  @keyframes walk-cycle {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(50%);
  }
}

}

@media (max-width: 1020px) {
  @keyframes walk-cycle {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(20%);
  }
}

}

@media (min-width: 768px) and (max-width: 820px) {
  @keyframes walk-cycle {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(0%);
  }
}

}


@media (max-width: 768px) {

  @keyframes walk-cycle {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(450%);
  }
}

  .walking-person img {
  position: relative;
  bottom: 0;
  width: 148px; /* Ajusta el ancho según el tamaño del GIF */
  height: 380px;
  animation: walk-cycle 4s linear infinite;
}

.walking-person {
  position: relative;
  bottom: 0;
  width: 100%;
  height: 400px; /* Ajusta la altura según sea necesario */
}


}


  </style>
</head>
<body>
    <header class=" flex mt-7 z-50 w-full mx-auto justify-center text-center">
        <h1 id="forus" class="text-black flex w-full text-5xl font-bold ml-10 mb-1 text-center">FOR <span class="text-blue-500 ml-2">US</span></h1>
        <a href="<?= URL; ?>" class="w-28 bg-slate-700 rounded-full text-white p-2 mt-5 flex justify-center font-semibold absolute top-5 right-5"><svg class="w-4 w-4 mr-3 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path class="fill-current" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>Login</a>
    </header>
        
    <!-- <div class="w-full h-screen text-start mx-auto flex flex-col items-center justify-center relative right-0">
        <div class="relative right-0">
            <h1 class="text-9xl text-start font-bold text-black mb-2">404</h1>
            <h1 class="text-5xl text-start font-bold text-black">We couldn't  <span class="text-blue-500 ml-2"> find the page</span></h1>
            <h1 class="text-5xl text-start font-bold text-blue-500">you were<span class="text-black ml-2"> looking for</span></h1>
            <a href="<?= URL; ?>" class="w-40 bg-slate-700 rounded-full text-white p-2 mt-5 flex justify-center font-semibold"><svg class="w-6 h-6 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path class="fill-current" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>Go home</a>
        </div>
    </div> -->
    <section class="flex w-full h-screen flex-col md:flex-row">
      <div class="walking-person z-40">
        <img class="" src="<?php echo GIFT; ?>404-9.gif" alt="">
      </div>
      <div class="flex flex-col items-center justify-center w-full ml-5 mr-10 sm:ml-0 sm:mr-0">
        <div>
          <h1 class="text-9xl text-start font-bold text-black mb-2">404</h1>
          <h1 class="text-5xl text-start font-bold text-black">We couldn't  <span class="text-blue-500 ml-2"> find the page</span></h1>
          <h1 class="text-5xl text-start font-bold text-blue-500">you were<span class="text-black ml-2"> looking for</span></h1>
          <a href="<?= URL; ?>" class="w-40 bg-slate-700 rounded-full text-white p-2 mt-5 flex justify-center font-semibold"><svg class="w-6 h-6 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path class="fill-current" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>Go home</a>
          </div>
        </div>
        </section>
</body>
</html>
