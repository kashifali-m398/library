@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<h1>Search Result</h1>
		</div>

		<hr class="col-md-12" />
	</div>

	<form class="row" action="{{ route('user.search_books') }}" method="GET">
		<input class="form-control col-md-3 mx-sm-2" placeholder="Book Title.." name="title" value="{{ app('request')->input('title') }}" />
		<input class="form-control col-md-3 mx-sm-2" placeholder="Author" name="author" value="{{ app('request')->input('author') }}" />
		<input class="form-control col-md-3 mx-sm-2" placeholder="Year" name="published_year" value="{{ app('request')->input('published_year') }}" />

		<button type="submit" class="btn btn-primary">Search</button>
	</form>

	<hr class="col-md-12" />

	<div class="row mb-10">

		@foreach($books as $book)
			<div class="col-md-3 holder">
				<h6>
					<a href="javascript://">
					{{ $book->title }}
					</a>
				</h6>
				<p>Author: {{ $book->author }}</p>
				<p>Year: {{ $book->published_year }}</p>
			</div>
		@endforeach

	</div>

	{{ $books->links() }}
@stop