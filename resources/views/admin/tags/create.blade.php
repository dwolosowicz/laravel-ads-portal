@extends("admin.app")

@section("body")
	{!! Form::model($tag = new \App\Entities\Tag(), [ 'action' => 'AdminTagsController@store' ]) !!}
		@include("admin.tags.partials._form", [ "submitText" => "Create" ])
	{!! Form::close() !!}
@stop