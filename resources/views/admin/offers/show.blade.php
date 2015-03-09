@extends("app")

@section("content")
	<article>
		<header>
			<h4>
				{{ $offer->title }}
			</h4>

			<p>
				<strong>
					Created at
				</strong>

				{{ $offer->created_at->format(Config::get('patterns.date.php')) }}
			</p>

			<p>
				<strong>
					Expires at
				</strong>

				{{ $offer->expires_at->format(Config::get('patterns.date.php')) }}
			</p>


			<p>
				<strong>
					Added by
				</strong>

				{{ $offer->user->name }}
			</p>
		</header>

		<section class="content">
			<p>{{ $offer->content }}</p>
		</section>
	</article>
@stop