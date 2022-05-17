<!DOCTYPE html>
<html>
	<head>
		<title>{{ $title ?? "Laravel" }}</title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<style>
.nav-toggle-label div > *,
.nav-toggle-label div::before,
.nav-toggle-label div::after{
	--t: .2s;
	--h: 4px;
	position: absolute;
	height: var(--h);
	left: 0;
	border-radius: inherit;
	transition: top var(--t) var(--d2,var(--t)), transform var(--t) var(--d,0s), opacity var(--t);
}

.nav-toggle-label div::before{
	--pos: 1;
	--dir: 45deg;
	top: calc(100% - var(--h));
}

.nav-toggle-label div::after{
	--pos: -1;
	--dir: -45deg;
	top: 0;
}

.nav-toggle-label div > div{
	top: calc(50% - var(--h) / 2);
}

input:checked ~ .nav-toggle-label div::before,
input:checked ~ .nav-toggle-label div::after{
	--d: var(--t);
	--d2: 0s;
	transform: rotate(var(--dir));
	top: calc(50% - var(--h) / 2);
}

input:checked ~ .nav-toggle-label div div{
	transform: translateX(100%);
	opacity: 0;
}

.nav-item-container > li{
	transition: box-shadow .3s, transform var(--dur,.8s) var(--delay,0s), opacity var(--dur,.8s) var(--delay,0s);
}

.nav-item-container{
	transition: transform .35s cubic-bezier(.45,-0.28,.12,.94);
}

		</style>
	</head>
	<body>
		<nav class=" h-14 bg-blue-400 flex justify-between px-4 md:px-40 items-center md:h-16">
			<div class="md:mr-5 -translate-x-3 opacity-0 transition-all duration-700">
				<h1 class="label-logo tracking-widest bg-black text-white rounded-sm px-4 py-1 hover:shadow-none duration-700 transition-shadow">Dabu2</h1>
			</div>

			<input type="checkbox" id="nav-toggle" class="peer hidden">
			<label for="nav-toggle" class="nav-toggle-label md:hidden">
				<div class="w-7 h-7 rounded-sm relative before:w-full before:bg-blue-200 before:block after:w-full after:bg-blue-200 after:block">
					<div class="w-full bg-blue-200"></div>
				</div>
			</label>
			<ul class="z-50 w-9/12 md:w-auto h-vh md:h-auto nav-item-container absolute top-0 left-0 bg-white shadow-md rounded-sm md:flex md:static md:bg-transparent md:shadow-none md:child:flex md:child:justify-center md:child:w-auto md:gap-1 child:text-md md:child:text-white child:font-light child:tracking-tighter md:-translate-x-0 -translate-x-full peer-checked:-translate-x-0 ">
				@if(!Auth::user())
				<li class="w-32 py-1 px-3 md:opacity-0 md:hover:shadow-border md:translate-x-4 rounded-inherit "><a href="/login">Login</a></li>
				<li class="w-32 py-1 px-3 md:opacity-0 md:hover:shadow-border md:translate-x-4 rounded-inherit "><a href="/register">Register</a></li>
			</ul>
		@else
				<li class="w-32 py-1 px-3 md:opacity-0 md:hover:shadow-border md:translate-x-4 rounded-inherit"><a href="/">Home</a></li>
				<li class="w-32 py-1 px-3 md:opacity-0 md:hover:shadow-border md:translate-x-4 rounded-inherit "><a href="/about">About</a></li>
				<li class="w-32 py-1 px-3 md:opacity-0 md:hover:shadow-border md:translate-x-4 rounded-inherit "><a href="/posts">Posts</a></li>
				<li class="w-32 py-1 px-3 md:opacity-0 md:hover:shadow-border md:translate-x-4 rounded-inherit "><a href="/categories">Categories</a></li>
				<li class="w-32 py-1 px-3 md:opacity-0 md:hover:shadow-border md:translate-x-4 rounded-inherit "><a href="/logout">Logout</a></li>
			@endif

		</nav>
		@yield('root')
		<script>
			let lblLogo = document.querySelector('.label-logo')
			let ipt = document.querySelector('#nav-toggle')
			let lis = document.querySelectorAll('.nav-item-container li')
			ipt.addEventListener('change',()=>{
							lis.forEach((e,n)=>{

											ipt.checked 
											? e.classList.add('item-popup')
											: e.classList.remove('item-popup')
										})
						})
			setTimeout(()=>{
							lblLogo.parentElement.classList.remove('opacity-0')
							lblLogo.parentElement.classList.remove('-translate-x-3')
							setTimeout(()=>{
											lblLogo.classList.add('shadow-ef')
										},500)
							lis.forEach((e,n)=>{
											e.style.setProperty('--s',`.${(n+1)}s`)
											if(window.innerWidth > 768){
												setTimeout(function (){
													e.classList.remove('md:translate-x-4','md:opacity-0')
												},n*200)
											}
										})
			},500)
		</script>
	</body>
</html>
