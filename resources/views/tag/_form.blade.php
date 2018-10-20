<!-- Title of Post Form Input -->
<div class="form-group @if ($errors->has('tag')) has-error @endif">
    {!! Form::label('tag', 'Tag') !!}
    {!! Form::text('tag', null, ['class' => 'form-control', 'placeholder' => 'Tag']) !!}
    @if ($errors->has('tag')) <p class="help-block">{{ $errors->first('tag') }}</p> @endif
</div>