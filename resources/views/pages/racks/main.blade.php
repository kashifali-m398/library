@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>Racks</h1>
		</div>

		<hr class="col-md-12" />

		@foreach($racks as $rack)
			<div class="col-md-3 holder">
				<h6>
					<a href="{{ route('user.rack_books', ['id'=>$rack->id]) }}">
					{{ $rack->name }}
					</a>
				</h6>
				<p>Books: {{ $rack->books->count() }}</p>
			</div>
		@endforeach

		{{ $racks->links() }}
	</div>
@stop