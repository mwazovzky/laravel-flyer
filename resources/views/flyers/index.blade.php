@extends('layouts.app')

@section('content')	

	<h1>List of Flyers</h1>
	<hr>
	
	@foreach($flyers as $flyer)
		<section>
			<h3>
				{{ $flyer->city }} 
				<strong><a href="
					{{ filtered_url(['page'], ['country' => $flyer->country]) }}
				">[{{ country($flyer->country) }}]</a></strong>
				<a href="{{ flyer_path($flyer)}}">{{ $flyer->street }}</a> 
				<span class="created-by">created by <a href="
					{{ filtered_url(['page'], ['name' => $flyer->user->name ]) }}
				">{{ $flyer->user->name }}</a><span>
			</h3>
			
			<p>{{ substr($flyer->description, 0, 250) . '...' }}</p>
			
		</section>
	@endforeach
	
	<div class="div-center">
		{{ $flyers->appends(Request::except('page'))->links() }}
	</div>
	
@stop

