@extends("templates.index")
@section("root")
	<x-section duration="900" class="px-5 md:px-40 mt-5">
		<form action="/posts" class="border-[1px] rounded-full m-auto flex items-center justify-center w-fit h-8 md:w-72">
			<input type="text" name="query" class="outline-none px-4 rounded-inherit w-full">
			<button type="submit" class="bg-blue-400 hover:shadow-border h-full rounded-inherit px-2 w-20">search</button>
		</form>
	</x-section>
@endsection
