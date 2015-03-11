@include("errors.list")

<div class="row">
	<div class="col-lg-3">
		<div class="form-group">
			{!! Form::text("title", null, [ 'class' => 'form-control', 'placeholder' => 'Title' ]) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-5">
		<div class="form-group">
			{!! Form::textarea("content", null, [ 'class' => 'form-control', 'placeholder' => 'Content' ]) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-3">
		<div class="input-group" data-plugin-datetimepicker>
			{!! Form::input("text", "expires_at", $offer->expires_at->format(Config::get('patterns.date.php')), [ 'class' => 'form-control', 'placeholder' => 'Expires at' ]) !!}
			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
		</div>
    </div>
</div> 

<hr/>

<div class="row">
	<div class="col-lg-3">	
		<div class="form-group">
			{!! Form::select('tags[]', $tagsList, null, [ 'multiple', 'data-select', 'class' => 'form-control', 'data-placeholder' => 'Choose some tags' ]) !!}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6">
		@foreach($tags as $tag)
			<p style="display: none" data-tag="{{ $tag->name }}">
				<strong>{{ $tag->name }}</strong>
				@if($tag->multiple)
					{!! Form::select('values[' . $tag->id . '][]', $tag->allValues($offer), $tag->values($offer), [ 'multiple', 'data-tags' => $tag->editable ? 'true' : 'false', 'data-select', 'class' => 'form-control']) !!}
				@else
					{!! Form::select('values[' . $tag->id . ']', $tag->allValues($offer), $tag->values($offer), [ 'data-tags' => $tag->editable ? 'true' : 'false', 'data-select', 'class' => 'form-control']) !!}
				@endif
			</p>
		@endforeach
	</div>
</div>

<hr/>

<div class="row">
	<div class="col-lg-2">
		{!! Form::button($submitText, [ 'class' => 'btn btn-primary', 'type' => 'submit']) !!}
	</div>
</div>