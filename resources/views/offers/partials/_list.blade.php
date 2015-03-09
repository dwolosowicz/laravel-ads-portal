@forelse($offers as $offer)
	<article @if($offer->expired()) class="expired" @endif>
		<header>
			<h4>
				<a href="{{ action("OffersController@show", $offer) }}">{{ $offer->title }}</a>
			</h4>

			<p>
				<small>
					Created at {{ $offer->created_at->format(Config::get('patterns.date.php')) }} | Expires at {{ $offer->expires_at->format(Config::get('patterns.date.php')) }}
				</small>
			</p>
		</header>

		<section class="content">
			<p>{{ $offer->content }}</p>
		</section>

		<ul class="list-inline">
			<li><a class="btn btn-xs btn-default" href="{{ action("OffersController@edit", $offer) }}"><span class="glyphicon glyphicon-pencil"></span> Edit</a></li>
			@unless($offer->expired())
			<li>
				{!! Form::open([ 'url' => action("OffersController@close", $offer), 'method' => 'POST' ]) !!}
					<button type="submit" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-eye-close"></span> Close</a>
				{!! Form::close() !!}
			</li>
			@endunless
			<li>
				{!! Form::open([ 'url' => action("OffersController@destroy", $offer), 'method' => 'DELETE' ]) !!}
					<button type="submit" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
				{!! Form::close() !!}
			</li>
		</ul>
	</article>


	@if($offers->count() > 1)
	<hr />
	@endif()

@empty
	<article>
		<header>
			<h4>No offers were added yet.</h4>
		</header>
	</article>
@endforelse