@extends("app")

@section("content")
	{!! Form::model($offer, [ 'action' => 'OffersController@store' ]) !!}
		@include("offers.partials._form", [ "submitText" => "Create" ])
	{!! Form::close() !!}
@stop