@extends("admin.app")

@section("body")
	<a class="btn btn-primary" href="{{ action("AdminTagsController@create") }}">New tag</a>

	<hr/>

	@forelse($tags as $tag)
		<article>
			<header>
				<h3>{{ $tag->name }}</h3>
				<p><small>
					@foreach($tag->default_values as $tagValue)
						{{ $tagValue }}
					@endforeach
				</small></p>
			</header>

			<ul class="list-inline">
				<li><a class="btn btn-xs btn-default" href="{{ action("AdminTagsController@edit", $tag) }}"><span class="glyphicon glyphicon-pencil"></span> Edit</a></li>
				<li>
					{!! Form::open([ 'url' => action("AdminTagsController@destroy", $tag), 'method' => 'DELETE' ]) !!}
						<button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
					{!! Form::close() !!}
				</li>
			</ul>
		</article>
	@empty
		<article>
			<header>
				<h3>No tags were found</h3>
			</header>
		</article>
	@endforelse
@stop