<div class="row">
	<div class="col-lg-4">
		<div class="form-group">
			{!! Form::text('name', null, [ 'class' => 'form-control', 'placeholder' => 'Name' ]) !!}
		</div>
	</div>	
</div>

<div class="row">
	<div class="col-lg-4">
		<div class="form-group">
			{!! Form::hidden('editable', 0) !!}
			{!! Form::checkbox('editable', '1') !!}
			{!! Form::label('editable') !!}
		</div>
	</div>	
</div>

<div class="row">
	<div class="col-lg-4">
		<div class="form-group">
			{!! Form::hidden('multiple', 0) !!}
			{!! Form::checkbox('multiple', '1') !!}
			{!! Form::label('multiple') !!}
		</div>
	</div>	
</div>

<div class="row">
	<div class="col-lg-12">
		<button type="button" class="btn btn-primary" data-create-row="#tagValue">Add Value</button>
	</div>
</div>

<div class="row">
	<div class="col-lg-4" data-row-container>
		@foreach($tag->default_values as $tagValue)
			<div class="input-group" data-row>
				{!! Form::text('default_values[]', $tagValue, [ 'class' => 'form-control', 'placeholder' => 'Value' ]) !!}
				<span class="input-group-btn">
					<button class="btn btn-danger" type="button" data-remove-row>
						&times;
					</button>
				</span>
			</div>
		@endforeach
	</div>
</div>

<hr/>

<div class="row">
	<div class="col-lg-4">
		<div class="form-group">
			{!! Form::button($submitText, [ 'class' => 'btn btn-primary', 'type' => 'submit' ]) !!}
		</div>
	</div>
</div>

<script type="text/template" id="tagValue">
	<div class="input-group" data-row>
		{!! Form::text('default_values[]', '', [ 'class' => 'form-control', 'placeholder' => 'Value' ]) !!}
		<span class="input-group-btn">
			<button class="btn btn-danger" type="button" data-remove-row>
				&times;
			</button>
		</span>
	</div>
</script>
