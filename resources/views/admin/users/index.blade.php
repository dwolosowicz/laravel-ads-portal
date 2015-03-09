@extends("admin.app")

@section("body")
	@foreach($users as $user)
		<article @unless($user->active) class="blocked" @endif>
			<header>
				<h4>{{ $user->name }}</h4>
				<p><strong>Created at</strong> {{ $user->created_at->format(Config::get('patterns.date.php')) }}</p>
				<p><strong>Blocked</strong> {{ $user->active ? "No" : "Yes" }}</p>
				<p>
					{!! Form::open([ 'url' => action("AdminUsersController@toggle", $user), 'method' => "POST" ]) !!}
						@if($user->active) <button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> Block account</button> @endif
						@unless($user->active) <button type="submit" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ok"></span> Unblock account</button> @endif
					{!! Form::close() !!}
				</p>
			</header>
		</article>
	@endforeach
@stop