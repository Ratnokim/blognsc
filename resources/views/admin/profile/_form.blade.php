<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	{!! Form::label('name', 'Nama', ['class'=>'col-md-3 control-label']) !!}
	<div class="col-md-8">
		{!! Form::text('name', null, ['class'=>'form-control']) !!}
		{!! $errors->first('name', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
	{!! Form::label('email', 'Email', ['class'=>'col-md-3 control-label']) !!}
	<div class="col-md-8">
		{!! Form::email('email', null, ['class'=>'form-control']) !!}
		{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('so_facebook') ? ' has-error' : '' }}">
	{!! Form::label('so_facebook', 'URL Facebook', ['class'=>'col-md-3 control-label']) !!}
	<div class="col-md-8">
		{!! Form::text('so_facebook', null, ['class'=>'form-control']) !!}
		{!! $errors->first('so_facebook', '<p class="help-block">:message</p>') !!}
	</div>
</div>


<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
	{!! Form::label('description', 'Deskripsi', ['class'=>'col-md-3 control-label']) !!}
	<div class="col-md-8">
		{!! Form::textarea('description', null, ['class'=>'form-control']) !!}
		{!! $errors->first('description', '<p class="help-block">:message</p>') !!}
	</div>
</div>


