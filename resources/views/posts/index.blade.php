@extends('templates.index')
@section('root')
	<x-circle-menu>
		<li class="menu-item opacity-0 w-0 h-0"><a href="{{ url("/posts/new") }}">new</a></li>
	</x-circle-menu>
	@if(count($posts))
		<section class="md:grid grid-cols-3 grid-rows-3 px-5 md:px-40 gap-1">

			<x-section
					delay="0"
					duration="1000"
					distance="40px"
					class="my-4 h-full w-full col-span-full"
					origin="x"
					>
					<div
							style="border: 1px solid rgb(226 232 240 / 1);"
							class="rounded-sm overflow-hidden p-1 shadow-sm h-60"
							>
							<div
									style="background-image: url('{{ $posts[0]->img }}');"
									class="transition-all duration-700 w-full h-40 rounded-sm bg-center bg-cover"
									>
							</div>
						<h2><a href="/posts/{{ $posts[0]->slug }}">{{ $posts[0]->title }}</a>

							<span class="text-xs mx-1 text-slate-400">By :</span>
							<a class="text-xs text-slate-400" href="{{ url("about/{$posts[0]->author->email}") }}">{{$posts[0]->author->name}}</a></h2>
						</h2>
						<small class="text-slate-500">{{ $posts[0]->excerpt }}</small>
					</div>
			</x-section>
			@foreach($posts as $post)
				@if($loop->first)
					@continue
				@endif
				<x-section
						delay="{{ ($loop->index+1)*250 }}"
						duration="1000"
						distance="20px"
						class="my-4 h-full w-full"
						>
						<div
								style="border: 1px solid rgb(226 232 240 / 1);"
								class="rounded-sm overflow-hidden p-1 shadow-sm h-60"
								>
								<div
										style="background-image: url('{{ $post->img }}');"
										class="bg-cover w-full h-40 rounded-sm bg-center bg-gray-100"
										>
								</div>
							<h2>
								<a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
								<span class="text-xs mx-1 text-slate-400">By :</span>
								<a class="text-xs text-slate-400" href="{{ url("about/{$post->author->email}") }}">{{$post->author->name}}</a></h2>
							<small class="text-slate-500">{{ $post->excerpt }}</small>
						</div>
				</x-section>
			@endforeach
		</section>
		<div class="px-5 md:px-40 mb-10">{{ $posts->links() }}</div>
	@else
		<x-section distance="40px" class="mt-20">
			<div class="text-center text-red-400">NO POSTS</div>
			<button class="px-5 py-1 mt-3 bg-blue-400 m-auto block rounded-md active:bg-blue-500">
				<a href="/" class="text-white">home</a>
			</button>
		</x-section>
	@endif
@endsection
