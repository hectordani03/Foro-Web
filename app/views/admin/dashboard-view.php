<?php
require_once LAYOUTS_AD . 'header.php';
?>

<style>
	#chartdiv {
		width: 98%;
		height: 260px;
	}

	::-webkit-scrollbar {
		width: 8px;
	}

	::-webkit-scrollbar-track {
		background-color: transparent;
	}

	::-webkit-scrollbar-thumb {
		background-color: #808080;
		border-radius: 6px;
	}


	::-webkit-scrollbar-track-piece {
		background-color: transparent;
	}


	::-webkit-scrollbar-thumb {
		background-color: #808080;
		border-radius: 6px;
	}
</style>

<main class="w-10/12 h-screen relative right-0 ml-auto bg-slate-200 mr-10">
	<!-- SEARCHER AND PROFILE -->
	<section class="min-h-20 flex justify-between">
		<div class="mt-5 text-gray-500 font-semibold ml-3">
			<i class='bx bx-search-alt-2 icon font-bold'></i>
			<input type="text" class="bg-slate-200" placeholder="Tap to search...">
		</div>
		<div class="mt-5 mr-20 flex">
			<i class='bx bxs-bell text-3xl mr-5 text-gray-500'></i>
			<div class="rounded-full bg-sky-500 h-fit p-4">
				<img src="<?=PROF_IMG?><?=$ua->profilePic?>" alt="">
			</div>
			<div class="flex flex-col">
				<p class="ml-5"><?= $ua->username ?></p>
			</div>
		</div>
	</section>

	<!-- FIRTS CARDS -->
	<section class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 place-items-center">
		<div class="bg-slate-100 border-r-2 border-b-2 h-32 h-max-32 max-h-32 w-full p-7 rounded-l-lg text-center lg:p-8 pt-3">
			<div class="flex gap-1 lg:gap-3 flex-col lg:flex-row items-center lg:ml-10">
				<i class="fa-duotone fa-user-group text-3xl text-slate-500"></i>
				<p class="mt-2 text-gray-500 font-semibold text-sm lg:text-md">Users</p>
			</div>
			<div class="flex justify-center gap-3 text-center">
				<p id="users" class="lg:text-2xl text-gray-500 font-medium text-xl"></p>
				<div class="bg-green-100 rounded-lg px-3 h-fit mt-1 text-green-700 text-center whitespace-nowrap lg:whitespace-normal">
					<small id="usersQuantity"></small>
					<i class='bx bx-chevrons-up text-green-700'></i>
				</div>
			</div>
		</div>
		<div class="bg-slate-100 border-r-2 border-b-2 h-32 h-max-32 max-h-32 w-full p-7 text-center lg:p-7 pt-3">
			<div class="flex gap-1 lg:gap-3 flex-col lg:flex-row lg:ml-8">
				<i class="fa-duotone fa-pen-to-square text-3xl text-slate-500"></i>
				<p class="mt-2 text-gray-500 font-semibold text-sm lg:text-md">Posts</p>
			</div>
			<div class="flex justify-center gap-3">
				<p id="posts" class="lg:text-2xl text-gray-500 font-medium text-xl"></p>
				<div class="bg-green-200 rounded-xl px-3 h-fit mt-1">
					<small id="postsQuantity"></small>
					<i class='bx bx-chevrons-up text-green-700'></i>
				</div>
			</div>
		</div>
		<div class="bg-slate-100 border-r-2 border-b-2 h-32 h-max-32 max-h-32 w-full p-7 text-center lg:p-7 pt-3">
			<div class="flex gap-1 lg:gap-3 flex-col lg:flex-row lg:ml-8">
				<i class="fa-duotone fa-circle-heart text-3xl text-red-500"></i>
				<p class="mt-2 text-gray-500 font-semibold text-sm lg:text-md">Likes</p>
			</div>
			<div class="flex justify-center gap-3">
				<p id="likes" class="lg:text-2xl text-gray-500 font-medium text-xl"></p>
				<div class="bg-green-200 rounded-xl px-3 h-fit mt-1">
					<small id="likesQuantity"></small>
					<i class='bx bx-chevrons-up text-green-700'></i>
				</div>
			</div>
		</div>
		<div class="bg-slate-100 border-r-2 border-b-2 h-32 h-max-32 max-h-32 w-full p-7 text-center lg:p-7 pt-3">
			<div class="flex gap-1 lg:gap-3 flex-col lg:flex-row text ml-5">
				<i class="fa-duotone fa-user-xmark text-3xl text-slate-500"></i>
				<p class="mt-2 text-gray-500 font-semibold text-sm lg:text-md whitespace-nowrap lg:whitespace-normal">Banned Users</p>
			</div>
			<div class="flex justify-center gap-3">
				<p id="bannedUsers" class="lg:text-2xl text-gray-500 font-medium text-xl"></p>
				<div class="bg-red-200 rounded-xl px-3 h-fit mt-1">
					<small id="banUQuantity"></small>
					<i class='bx bx-chevrons-up text-red-700'></i>
				</div>
			</div>
		</div>
		<div class="bg-slate-100 border-r-2 border-b-2 h-32 h-max-32 max-h-32 w-full rounded-r-lg text-center lg:p-7 pt-3">
			<div class="flex gap-1 lg:gap-3gap-1 lg:gap-3 flex-col lg:flex-row ml-5">
				<i class="fa-duotone fa-list text-3xl text-slate-500"></i>
				<p class="mt-2 text-gray-500 font-semibold text-sm lg:text-mdtext-sm lg:text-md">Categories</p>
			</div>
			<div class="flex justify-center gap-3">
				<p id="categories" class="lg:text-2xl text-gray-500 font-medium text-xl"></p>
				<div class="bg-green-200 rounded-xl px-3 h-fit mt-1">
					<small id="catQuantity"></small>
					<i class='bx bx-chevrons-up text-green-700'></i>
				</div>
			</div>
		</div>
	</section>

	<!-- CHART ANF CATEGORIES -->
	<section class="flex gap-5 flex-col lg:flex-row">
		<div class="lg:w-9/12 w-12-12 rounded-lg bg-slate-100 mt-7 h-64 relative px-4 py-2 pl-10">
			<!-- HTML -->
			<div id="chartdiv" class="absolute"></div>
		</div>

		<div class="lg:w-3/12 w-12-12 rounded-lg bg-gradient-to-t from-slate-100 to-slate-100 mt-7 overflow-auto relative h-auto">
			<p class="text-slate-700 font-semibold text-xl m-5">Cate<span class="text-blue-500">gories</span></p>
			<ul id="categorieslist" class=" ml-7 flex lg:flex-col gap-2 lg:absolute">

			</ul>
		</div>

	</section>
	
	<section class="flex gap-5 relative flex-col lg:flex-row">
		<div class="lg:w-4/12 w-12/12 rounded-lg bg-slate-100 mt-7 h-auto relative overflow-auto ml-8">
			<p class="text-gray-700 font-semibold text-xl m-5">Activ<span class="text-blue-500">ity</span></p>
			<div class="lg:absolute">
				<ol id="activityLog" class="relative border-s border-gray-400 ml-7 mr-4">

				</ol>
			</div>
		</div>
		<div class="lg:w-8/12 w-12/12 rounded-lg bg-slate-100 mt-7 h-64 relative">
			<div class="absolute w-full">
				<p class="text-slate-700 font-semibold text-xl m-5">Reported <span class="text-blue-500">Users</span></p>
				<table id="dashUsersDT" class="hover row-border table w-full"></table>
			</div>
		</div>
	</section>
</main>

<?php
require_once LAYOUTS_AD . 'footer.php';
setFooter($d, "chart");
?>
<script>
	$(function() {
		app_ad.dashUsersDT();
		app_ad.dashboardView()
	})
</script>