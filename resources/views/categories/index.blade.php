@extends("templates.index")
@section("root")
	<section class="px-5 md:px-40 mt-5">
		@foreach($categories as $category)
			<x-section delay="{{$loop->index*300}}" class="py-1 px-3 bg-slate-100 w-fit inline-block mb-1"><a href="/categories/{{$category->slug}}">{{$category->name}}</a></x-section>
		@endforeach
		{{$categories->links()}}
	</section>
@endsection
