@extends("app")

@section("content")
	<div class="row">
		<div class="col-lg-2">
			<ul class="list-unstyled">
				<li>
					<a class="btn btn-primary btn-block" href="{{ action("OffersController@create") }}">New offer</a>
				</li>
			</ul>
		</div>
		<div class="col-lg-10">
		    @include("offers.partials._list")
		</div>
	</div>
@stop