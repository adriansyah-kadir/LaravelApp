@extends('templates.index')
@section('root')
	@if(Auth::id() == $post->author->id)
		<x-circle-menu>
			<li class="menu-item opacity-0 w-0 h-0"><a href="{{ url()->current() }}/edit">edit</a></li>
			<li class="menu-item opacity-0 w-0 h-0"><a href="{{ url("/posts/new") }}">new</a></li>
			<li class="menu-item opacity-0 w-0 h-0"><a href="{{ url()->current() }}/delete">delete</a></li>
			<li class="menu-item opacity-0 w-0 h-0"><a href="{{ url("/posts") }}">posts</a></li>
		</x-circle-menu>
	@endif
	<x-section class="px-5 md:px-40 mt-5" distance="20px">
		<div class="head-section relative h-44 hover:opacity-80 transition-all duration-500 rounded-sm w-full bg-cover bg-center hover:child:opacity-100 bg-gray-100"
				 style="background-image: url('{{asset($post->img)}}');"
			>
			<h2 class="absolute -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 text-2xl font-bold opacity-0 transition-all duration-700">{{$post->title}}</h2>
		</div>
		<small><a href="/about/{{$post->author->email}}">By : {{$post->author->name}}</a></small>
		<br>
		<small>Category :
			@foreach($post->categories as $category)
				<span>{{ $category->name }}</span>
			@endforeach
		</small>
		<br>
		<small>
			Uploaded : {{ $post->published_at }}
		</small>
		<p class="indent-3 text-justify mt-5">
		{{$post->body}}
		</p>
	</x-section>
@endsection
