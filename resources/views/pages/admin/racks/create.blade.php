@extends('eadmin.layouts.material')

@section('content')
<div class="row">
    <div class="col-lg-12">
    	<div class="white-box">
	        <h3 class="box-title m-b-0">Add New Rack</h3>
	        <p class="text-muted m-b-30 font-13"></p>
	        <div class="row">
	            <div class="col-sm-12 col-xs-12">
	            	@if(\Request::route()->getName() == 'admin.racks.edit')
	            		{!! Form::model($rack, ['route' => ['admin.racks.update', 'id'=>$rack->id], 'method' => 'post', 'files'=>false]) !!}
	            	@else
	            		{!! Form::open(['route' => 'admin.racks.store', 'method' => 'post', 'files'=>false]) !!}
	            	@endif

	            		<div class="form-group">
		            		{!! Form::label('name', 'Name') !!}
		            		{!! Form::text('name', null,['placeholder'=>'Enter Rack Name', 'class'=>'form-control']) !!}
		            		<p class="form-feedback">Rack names should be unique.</p>
	            		</div>

	            		<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>

	            	{!! Form::close() !!}
	            </div>
	        </div>
	    </div>
    </div>
</div>
@stop