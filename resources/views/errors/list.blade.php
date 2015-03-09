@if($errors->count() > 0)
<div class="alert alert-danger">
	<p><strong>Form is invalid</strong></p>

	@foreach($errors->all() as $error)
		<p>{{ $error }}</p>
	@endforeach
</div>
@endif