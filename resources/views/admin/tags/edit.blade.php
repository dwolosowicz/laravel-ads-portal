@extends("admin.app")

@section("body")
	{!! Form::model($tag, [ 'action' => [ 'AdminTagsController@update', $tag ], 'method' => 'PUT' ]) !!}
		@include("admin.tags.partials._form", [ "submitText" => "Update" ])
	{!! Form::close() !!}
@stop