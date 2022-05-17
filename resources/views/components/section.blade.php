	<!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
<style>
	.x-section:where([id='x-section-{{ $id }}']){
		transition: transform {{ $duration }}ms {{ $delay }}ms {{ $cubic }}, opacity {{ $duration }}ms {{ $delay }}ms;
		transform: translate{{ $origin }}({{ $distance }});
		opacity: 0;
	}
</style>
<section class="x-section {{ $class }}" id="x-section-{{ $id }}" style="{{ $style }}">
	{{ $slot }}
</section>
<script defer>
	let x_section_{{ $id }} = document.querySelector(".x-section:where([id='x-section-{{ $id }}'])")
	setTimeout(()=>{
					x_section_{{$id}}.style.opacity = 1
					x_section_{{$id}}.style.transform = 'translate(0)'
		},0)
</script>
