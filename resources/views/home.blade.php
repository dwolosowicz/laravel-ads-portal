@extends('app')

@section('content')
	@forelse($offers as $offer)
		<article>
			<header>
				<h4>
					<a href="{{ action("HomeController@details", $offer) }}">{{ $offer->title }}</a>
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
@endsection
