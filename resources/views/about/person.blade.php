@extends("templates.index")
@section("root")
	<x-section delay="600" class="px-5 md:px-40">
		<div class="z-0 w-40 h-40 md:w-52 md:h-52 mt-12 m-auto shadow-xl border-2 border-slate-400 rounded-full bg-center bg-no-repeat bg-cover" style="background-image: url('{{ asset($user->img) }}');" ></div>
		<div class="shadow-md bg-gray-400 w-fit m-auto px-5 py-2 mt-5 rounded-md">
			<h1 class="text-xl text-center font-bold">{{ $user->name }}</h1>
			<a class="text-sm text-center block text-blue-600" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
		</div>
		<section class="mt-5">
			<details class="shadow-md py-3 px-2 rounded-md">
					<summary >Post :</summary>
				<div class="px-5">
					@foreach($user->posts as $post)
						<div>
							<h5 class="hover:underline cursor-pointer"><a href="/posts/{{$post->slug}}">{{$post->title}}</a></h5>
						</div>
					@endforeach
				</div>
			</details>
		</section>
	</x-section>
@endsection
