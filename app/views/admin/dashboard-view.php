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

<main class="w-10/12 h-screen bg-slate-200 relative right-0 ml-auto">
	<!-- SEARCHER AND PROFILE -->
	<section class="min-h-20 flex justify-between">
		<div class="mt-5 text-gray-500 font-semibold ml-3">
			<i class='bx bx-search-alt-2 icon font-bold'></i>
			<input type="text" class="bg-slate-200" placeholder="Tap to search...">
		</div>
		<div class="mt-5 mr-20 flex">
			<i class='bx bxs-bell text-3xl mr-5 text-gray-500' ></i>
			<div class="rounded-full bg-sky-500 h-fit p-4"></div>
			<div class="flex flex-col">
				<p class="ml-5">Jose Joshua</p>
				<small class="block ml-5">Administrador</small>
			</div>
		</div>
	</section>
	<!-- FIRTS CARDS -->
	<section class="w-full flex flex-wrap lg:flex-nowrap">
		<div class="bg-slate-100 border-r-2 h-32 h-max-32 max-h-32 w-1/5 p-7 rounded-l-lg">
			<div class="flex gap-3">
				<i class="fa-duotone fa-user-group text-3xl text-slate-500"></i>
				<p class="mt-2 text-gray-500 font-semibold text-md">Users</p>
			</div>
			<div class="flex justify-center gap-3 text-center">
				<p class="text-2xl text-gray-500 font-medium">32</p>
				<div class="bg-green-100 rounded-lg px-3 h-fit mt-1 text-green-700 text-center"><small>+2</small><i class='bx bx-chevrons-up text-green-700'></i></div>
			</div>
		</div>
		<div class="bg-slate-100 border-r-2 h-32 h-max-32 max-h-32 w-1/5 p-7">
			<div class="flex gap-3">
				<i class="fa-duotone fa-pen-to-square text-3xl text-slate-500"></i>
				<p class="mt-2 text-gray-500 font-semibold text-md">Posts</p>
			</div>
			<div class="flex justify-center gap-3">
				<p class="text-2xl text-gray-500 font-medium">82</p>
				<div class="bg-green-200 rounded-xl px-3 h-fit mt-1"><i class='bx bx-chevrons-up text-green-700'></i></div>
			</div>
		</div>
		<div class="bg-slate-100 border-r-2 h-32 h-max-32 max-h-32 w-1/5 p-7">
			<div class="flex gap-3">
				<i class="fa-duotone fa-circle-heart text-3xl text-red-500"></i>
				<p class="mt-2 text-gray-500 font-semibold text-md">Likes</p>
			</div>
			<div class="flex justify-center gap-3">
				<p class="text-2xl text-gray-500 font-medium">192</p>
				<div class="bg-green-200 rounded-xl px-3 h-fit mt-1"><i class='bx bx-chevrons-up text-green-700'></i></div>
			</div>
		</div>
		<div class="bg-slate-100 border-r-2 h-32 h-max-32 max-h-32 w-1/5 p-7">
			<div class="flex gap-3">
				<i class="fa-duotone fa-user-xmark text-3xl text-slate-500"></i>
				
				<p class="mt-2 text-gray-500 font-semibold text-md">Banned Users</p>
			</div>
			<div class="flex justify-center gap-3">
				<p class="text-2xl text-gray-500 font-medium">8</p>
				<div class="bg-red-200 rounded-xl px-3 h-fit mt-1"><i class='bx bx-chevrons-up text-red-700'></i></div>
			</div>
		</div>
		<div class="bg-slate-100 border-r-2 h-32 h-max-32 max-h-32 w-1/5 p-7 rounded-r-lg mr-10">
			<div class="flex gap-3">
			<i class="fa-duotone fa-list text-3xl text-slate-500"></i>
				<p class="mt-2 text-gray-500 font-semibold text-md">Categories</p>
			</div>
			<div class="flex justify-center gap-3">
				<p class="text-2xl text-gray-500 font-medium">7</p>
				<div class="bg-green-200 rounded-xl px-3 h-fit mt-1"><i class='bx bx-chevrons-up text-green-700'></i></div>
			</div>
		</div>
	</section>
	<section class="flex gap-5">
		<div class="w-9/12 rounded-lg bg-slate-100 mt-7 h-64 relative px-4 py-2 pl-4">
			<!-- HTML -->
			<div id="chartdiv" class="absolute"></div>
		</div>
		<div class="w-3/12 rounded-lg bg-gradient-to-t from-slate-100 to-slate-100 mt-7 mr-10 overflow-auto relative h-auto">
			<p class="text-slate-700 font-semibold text-xl m-5">Cate<span class="text-blue-500">gories</span></p>
			<ul class=" ml-7 flex flex-col gap-2 absolute">
				<li class="flex w-full gap-5">
					<img class="rounded-lg w-10 h-10" src="<?php echo LOGIN_IMG; ?>obj2.png" alt="" class="w-full">
					<span class="text-slate-500 w-full font-semibold text-sm mt-1">Zero Hunger</span>
				</li>
				<li class="flex w-full gap-5">
					<img class="rounded-lg w-10 h-10" src="<?php echo LOGIN_IMG; ?>obj4.png" alt="" class="w-full">
					<span class="text-slate-500 w-full font-semibold text-sm mt-1">Quality Education</span>
				</li>
				<li class="flex w-full gap-5">
					<img class="rounded-lg w-10 h-10" src="<?php echo LOGIN_IMG; ?>obj13.png" alt="" class="w-full">
					<span class="text-slate-500 w-full font-semibold text-sm mt-1">Climate Action</span>
				</li>
				<li class="flex w-full gap-5">
					<img class="rounded-lg w-10 h-10" src="<?php echo LOGIN_IMG; ?>obj14.png" alt="" class="w-full">
					<span class="text-slate-500 w-full font-semibold text-sm mt-1">Life Below Water</span>
				</li>
				<li class="flex w-full gap-5 mb-5">
					<img class="rounded-lg w-10 h-10" src="<?php echo LOGIN_IMG; ?>obj10.png" alt="" class="w-full">
					<span class="text-slate-500 w-full font-semibold text-sm mt-1">Reduced Inequalities</span>
				</li>
			</ul>
		</div>
	</section>
	<section class="flex gap-5 relative">
		<div class="w-4/12 rounded-lg bg-slate-100 mt-7 h-auto relative overflow-auto">
			<p class="text-gray-700 font-semibold text-xl m-5">Activ<span class="text-blue-500">ity</span></p>
			<div class="absolute">
				<ol class="relative border-s border-gray-400 ml-7 mr-4">                  
					<li class="mb-10 ms-6">            
						<span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-slate-200 ">
							<img class="rounded-full shadow-lg" src="<?php echo PROF_IMG; ?>Cali_79.jpg"/>
						</span>
						<div class="items-center justify-between p-4 bg-slate-200 border border-gray-200 rounded-lg shadow-sm sm:flex ">
							<time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">just now</time>
							<div class="text-sm font-normal text-gray-500">Bonnie moved <a href="#" class="hover:underline">Jese Leos</a> to </div>
						</div>
					</li>
					<li class="mb-10 ms-6">
						<span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-slate-200">
							<img class="rounded-full shadow-lg" src="<?php echo PROF_IMG; ?>default.png" />
						</span>
						<div class="p-4 bg-slate-200 border border-gray-200 rounded-lg shadow-sm ">
							<div class="items-center justify-between mb-3 sm:flex">
								<time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">2 hours ago</time>
								<div class="text-sm font-normal text-gray-500 lex ">Thomas Lean commented on  <a href="#" class="font-semibold hover:underline">Flowbite Pro</a></div>
							</div>
							<div class="p-3 text-xs italic font-normal text-gray-500 border border-gray-200 rounded-lg bg-slate-300">Hi ya'll! I wanted to share a webinar zeroheight is having regarding how to best measure your design system! This is the second session of our new webinar series on #DesignSystems discussions where we'll be speaking about Measurement.</div>
						</div>
					</li>
					<li class="mb-5 ms-6">            
						<span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-slate-200 ">
							<img class="rounded-full shadow-lg" src="<?php echo PROF_IMG; ?>Cali_79.jpg"/>
						</span>
						<div class="items-center justify-between p-4 bg-slate-200 border border-gray-200 rounded-lg shadow-sm sm:flex ">
							<time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">just now</time>
							<div class="text-sm font-normal text-gray-500">Bonnie moved <a href="#" class="hover:underline">Jese Leos</a> to</div>
						</div>
					</li>
				</ol>
			</div>
		</div>
		<div class="w-8/12 rounded-lg bg-slate-100 mt-7 h-64 mr-10 relative">
			<div class="absolute w-full">
			<p class="text-slate-700 font-semibold text-xl m-5">Reported <span class="text-blue-500">Users</span></p>
<table id="datatable" class="hover row-border table w-full"></table>
			</div>
		</div>
	</section>
</main>

<?php
	require_once LAYOUTS_AD . 'footer.php';
?>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dataTable = $('#datatable').DataTable({
            ajax: {
                url: 'http://localhost/For-Us/app/user/requestControllers/reports/reportedpost.php',
                dataSrc: json => json.data
            },
            columns: [{
                    title: 'Post id',
                    data: 'id_post'
                },
                {
                    title: 'Reported user',
                    data: 'id_user'
                },
                {
                    title: 'Reporting user',
                    data: 'id_reporting_user'
                },
                {
                    title: 'Reports',
                    data: 'reason'
                },
                {
                    title: 'State',
                    data: 'state'
                },
                {
                    title: 'Actions',
                    render: function(data, type, row) {
                        var state = row.state;
                        if (state === 0) {
                            return '<button class="button danger-button btn-view-post" data-id_post="' + row.id_post + '">Delete</button>';
                        } else {
                            return '';
                        }
                    }
                },
            ],
            drawCallback: function() {
                $('#datatable thead th, tbody td').css('text-align', 'center', 'margin', '0', 'padding', '0');

                $('.btn-view-post').on('click', function() {
                    const rowData = dataTable.row($(this).closest('tr')).data();

                    if (rowData) {
                        openModal(rowData);
                    } else {
                        console.error('No se pudo obtener los datos de la fila.');
                    }
                });
            }
        });

    });
</script>