@extends('eadmin.layouts.material')

@section('content')
<div class="row">
    <div class="col-lg-12">
    	<div class="white-box">
	        <h3 class="box-title m-b-0">Add New Rack</h3>
	        <p class="text-muted m-b-30 font-13"></p>
	        <div class="row">
	            <div class="col-sm-12 col-xs-12">
	            	@if(\Request::route()->getName() == 'admin.books.edit')
	            		{!! Form::model($book, ['route' => ['admin.books.update', 'id'=>$book->id], 'method' => 'post', 'files'=>false]) !!}
	            	@else
	            		{!! Form::open(['route' => 'admin.books.store', 'method' => 'post', 'files'=>false]) !!}
	            	@endif
	            		<div class="form-group form-group {{ $errors->has('rack_id') ? ' has-error' : '' }}">
		            		{!! Form::label('rack_id', 'Rack') !!}
		            		{!! Form::select('rack_id', $rackSelect, null, ['placeholder'=>'Select Rack', 'class'=>'form-control']) !!}
		            		@if ($errors->has('rack_id'))
	                            <div class="form-control-feedback">{{ $errors->first('rack_id') }}</div>
	                        @endif
	            		</div>

	            		<div class="form-group">
		            		{!! Form::label('title', 'Title') !!}
		            		{!! Form::text('title', null,['placeholder'=>'Enter Book Title', 'class'=>'form-control']) !!}
	            		</div>

	            		<div class="form-group">
		            		{!! Form::label('author', 'Author Name') !!}
		            		{!! Form::text('author', null,['placeholder'=>'Enter Author Name', 'class'=>'form-control']) !!}
	            		</div>

	            		<div class="form-group">
		            		{!! Form::label('published_year', 'Published Year') !!}
		            		{!! Form::number('published_year', null,['placeholder'=>'Enter Published Year e.g. 2009', 'class'=>'form-control']) !!}
	            		</div>

	            		<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>

	            	{!! Form::close() !!}
	            </div>
	        </div>
	    </div>
    </div>
</div>
@stop