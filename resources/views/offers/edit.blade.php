@extends("app")

@section("content")
	{!! Form::model($offer, [ 'url' => action("OffersController@update", $offer), 'method' => "PATCH" ]) !!}
		@include("offers.partials._form", [ "submitText" => "Update" ])
	{!! Form::close() !!}
@stop