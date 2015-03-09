@extends("app")

@section("content")
	{!! Form::model($offer, [ 'url' => action("AdminOffersController@update", $offer), 'method' => "PATCH" ]) !!}
		@include("admin.offers.partials._form", [ "submitText" => "Update" ])
	{!! Form::close() !!}
@stop