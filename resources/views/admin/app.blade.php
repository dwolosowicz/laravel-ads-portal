@extends("app")

@section("content")
	<div class="row">
		<div class="col-lg-2">
			<ul class="nav nav-pills nav-stacked">
				<li class="{{ Active::pattern("admin/offers*") }}"><a href="{{ action("AdminOffersController@index") }}">Offers</a></li>
				<li class="{{ Active::pattern("admin/tags*") }}" ><a href="{{ action("AdminTagsController@index") }}">Tags</a></li>
				<li class="{{ Active::pattern("admin/users*") }}" ><a href="{{ action("AdminUsersController@index") }}">Users</a></li>
			</ul>
		</div>	

		<div class="col-lg-10">
			@yield("body")	
		</div>
	</div>
@stop