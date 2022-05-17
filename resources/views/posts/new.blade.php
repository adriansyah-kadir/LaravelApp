@extends("templates.index")
@section("root")
	<x-circle-menu/>
	<x-section class="px-5 md:px-40 mt-5">
		<form class=" flex flex-col gap-3" action="{{url("/posts/new")}}" method="post" enctype="multipart/form-data">
			@csrf
			@if(isset($post))
				<input name="id" value="{{ $post->id }}" class="hidden">
			@endif
			<label class="relative transition-all border-2">
				<input id="title" type="text" name="title" class="w-full h-8 peer outline-none mt-5 placeholder-shown:mt-0 px-2" placeholder=" " value="@if(isset($post)) {{ $post->title }} @endif">
				<span class="transition-all absolute left-2 top-0 translate-y-0 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:text-slate-300 text-slate-500">title : </span>
			</label>
			@error("title")
			{{$message}}
		@enderror
		<label class="relative transition-all border-2">
			<textarea class="indent-3 peer w-full outline-none px-2 mt-5" placeholder=" " name="body">
@if(isset($post)) {{ $post->body }} @endif
			</textarea>
			<span class="2transition-all absolute left-2 top-0 translate-y-0 peer-placeholder-shown:text-slate-300 text-slate-500">body : </span>
		</label>
		@error("body")
		{{$message}}
	@enderror
	<div class="flex">
		<label class="relative transition-all w-full border-2">
			<input id="category" type="text" name="category" class="w-full h-8 peer outline-none mt-5 placeholder-shown:mt-0 px-2" placeholder=" " value="@if(isset($post)) {{ $post->categories[0]->name }} @endif">
			<span class="transition-all absolute left-2 top-0 translate-y-0 peer-placeholder-shown:top-1/2 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:text-slate-300 text-slate-500">category : </span>
		</label>
		@if(count($categories))
			<select class="outline-none" id="select-category">
				<option></option>
				@foreach($categories as $category)
					<option value="{{$category}}">{{$category}}</option>
				@endforeach
			</select>
		@endif
	</div>
	@error("category")
	{{$message}}
@enderror
<label>
<input type="file" class="hidden" name="img">
	<div class="m-auto w-20 h-8 flex items-center justify-center bg-slate-300 hover:bg-slate-200" style="box-shadow: 1px 1px 2px -1px inset white, 1px 1px 4px 0 rgb(0 0 0 / .3);">image</div>
</label>
	@error("img")
	{{$message}}
@enderror
<div class="flex items-center justify-center gap-5">
	<button type="reset" class="w-20 h-10 bg-blue-200">clear</button>
	<button type="submit" class="w-20 h-10 bg-blue-200">@if(isset($post)) save @else submit @endif</button>
</div>
		</form>
	</x-section>
	<script>
		let category_ipt = document.querySelector("#category");
		let category_slct = document.querySelector("#select-category")
		category_slct.onchange = ()=> {
					category_ipt.value = category_slct.value
				}
		category_ipt.oninput = ()=>{
					category_slct.value = ""
				}
		{{-- let slug_ipt = document.querySelector("#slug") --}}
		{{-- let title_ipt = document.querySelector("#title") --}}
		{{-- title_ipt.onchange = async ()=>{ --}}
		{{-- 			let slug = await fetch("{{url("/api/slug")}}?title="+title_ipt.value).then(res=>res.text()) --}}
		{{-- 			slug_ipt.value = slug --}}
		{{-- 		} --}}
	</script>
@endsection
