@extends("templates.index")
@section("root")
	<x-section class="px-5 md:px-40 flex items-center justify-center mt-5">
		@error("error")
		{{$message}}
		@enderror
		<form method="post" action="{{ url("login") }}" class="bg-slate-200 w-fit flex items-center justify-center flex-col gap-2 px-4 py-2 child:rounded-sm child:px-2 child:outline-none child:py-1 rounded-md shadow-md">
			@csrf
			<input type="email" name="email" placeholder="email" value="{{old("email")}}">
			<input type="password" name="password" placeholder="password" value="{{ old("password") }}">
			<input type="checkbox" name="remember">
			<span><button type="submit">login</button><span class="mx-2">or</span><button><a href="{{ url("/register") }}">Register</a></button></span>
		</form>
	</x-section>
@endsection
