<div>
    <!-- When there is no desire, all things are at peace. - Laozi -->
	<style>
.menu-item{
	transition: all 500ms;
}
#posts-menu:checked ~ label > ul > .menu-item{
	transition: all .5s ,transform 1s 300ms cubic-bezier(0.19, 1, 0.22, 1), opacity 1s 300ms;
	transform-origin: center;
	opacity: 1;
	width: 40px;
	height: 40px;
	transform: translateX(50px);
}

#posts-menu ~ label{
	background-image: url('/storage/images/circle-plus.svg');
	transition: all 300ms 150ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

#posts-menu:checked ~ label{
	transition-delay: 0;
}

#posts-menu:checked ~ label > ul{
	transform: translate(0);
	transition: none;
}
	</style>
	<input type="checkbox" class="hidden peer" id="posts-menu">
	<label for="posts-menu" class="z-50 flex w-10 h-10 items-center justify-center rounded-full shadow-md fixed bottom-10 left-5 peer-checked:bottom-32 peer-checked:shadow-xl">
		<ul class="menu flex transition-all delay-150 -translate-x-96 flex-col gap-3 items-center justify-center child:rounded-full child:flex child:items-center child:justify-center child:bg-slate-500 child:text-white">
			{{ $slot }}
		</ul>
	</label>
</div>
{{-- <div class="fixed bottom-5 left-5"> --}}
{{-- 	<label> --}}
{{-- 		<input type="checkbox" class="hidden peer"> --}}
{{-- 		<div class="w-10 h-10 transition-all duration-300 peer-checked:child:rotate-45 peer-checked:-translate-y-36" style="transition-timing-function: cubic-bezier(0.6, -0.28, 0.735, -0.045);"> --}}
{{-- 			<img src="/storage/images/circle-plus.svg" class="w-full transition-all" style="transition-timing-function: cubic-bezier(0.6, -0.28, 0.735, 0.045);"> --}}
{{-- 		</div> --}}
{{-- 		<ul class="peer-checked:-translate-y-36"> --}}
{{-- 			<li><a href="#">hai</a></li> --}}
{{-- 			<li><a href="#">hai</a></li> --}}
{{-- 			<li><a href="#">hai</a></li> --}}
{{-- 		</ul> --}}
{{-- 	</label> --}}
{{-- </div> --}}
