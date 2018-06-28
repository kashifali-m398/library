@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>Rack: {{ $rack->name }}</h1>
		</div>

		<hr class="col-md-12" />
	</div>

	<form class="row" action="{{ route('user.search_books') }}" method="GET">
		<input class="form-control col-md-3 mx-sm-2" placeholder="Book Title.." name="title" />
		<input class="form-control col-md-3 mx-sm-2" placeholder="Author" name="author" />
		<input class="form-control col-md-3 mx-sm-2" placeholder="Year" name="published_year" />

		<button type="submit" class="btn btn-primary">Search</button>
	</form>

	<hr class="col-md-12" />

	<div class="row">


		@foreach($rack->books as $book)
			<div class="col-md-3 holder">
				<h6>
					<a href="#">
					{{ $book->title }}
					</a>
				</h6>
				<p>Author: {{ $book->author }}</p>
				<p>Year: {{ $book->published_year }}</p>
			</div>
		@endforeach

	</div>
@stop