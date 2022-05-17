@extends("templates.index")
@section("root")
	<x-section class="px-5 md:px-40 w-full mt-5">
		@if(session('error'))
			<span>{{session('error')}}</span>
		@endif
		<form enctype="multipart/form-data" action="{{url("register")}}" method="post" class="m-auto bg-blue-200 flex items-center justify-center flex-col gap-2 w-fit px-10 py-5 hover:child:shadow-border child:outline-none rounded-md shadow-md child:rounded-sm child:px-2 child:py-1">
		@csrf
			<input name="username" placeholder="username" value="{{ old("username") }}">
			@error('username')
				<span>{{ $message }}</span>
			@enderror
			<input name="email" placeholder="email" value="{{ old("email") }}">
			@error('email')
				<span>{{ $message }}</span>
			@enderror
			<input name="password" placeholder="password">
			@error('password')
				<span>{{ $message }}</span>
			@enderror
			<input name="img" type="file" class="hidden" id="img">
			@error('img')
				<span>{{ $message }}</span>
			@enderror
			<label for="img" style="box-shadow: 1px 1px 2px -1px inset white, 1px 1px 4px 0 rgb(0 0 0 / .3);" class="bg-slate-300 hover:bg-slate-200 transition-all">photo profile</label>
			<button type="submit" class="bg-white shadow-md hover:bg-slate-100">submit</button>
		</form>
	</x-section>
@endsection
