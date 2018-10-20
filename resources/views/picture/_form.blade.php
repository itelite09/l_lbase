<!-- Title of Post Form Input -->
<div class="form-group @if ($errors->has('image')) has-error @endif">
	{!! Form::label('image', 'Image') !!}
	{!! Form::text('image', null, ['class' => 'form-control', 'placeholder' => 'Image']) !!}
	@if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif
</div>

<!-- Tags Selector -->
<div class="form-group @if ($errors->has('tags')) has-error @endif">
	{!!  Form::label('tags','Select Tags:') !!} 
	{!! Form::select('tags[]', $tagsDropDown, '0', ['placeholder' => 'Pick a tag or several tags...', 'multiple' => true, 'class' => 'form-control margin']) !!}
	@if ($errors->has('tags')) <p class="help-block">{{ $errors->first('tags') }}</p> @endif
</div>