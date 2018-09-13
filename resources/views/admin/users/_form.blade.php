<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	{!! Form::label('name', 'Nama User', ['class'=>'col-md-3 control-label']) !!}
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

<div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
	{!! Form::label('avatar', 'Picture', ['class'=>'col-md-3 control-label']) !!}
	<div class="col-md-4">
		{!! Form::file('avatar') !!}
		
		{!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}
	</div>
</div>

<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
	{!! Form::label('role', 'Role', ['class'=>'col-md-3 control-label']) !!}
	<div class="col-md-8">
		{!! Form::select('role',['master' => 'Master', 'admin' => 'Admin'], null, ['class'=>'form-control']) !!}
		{!! $errors->first('role', '<p class="help-block">:message</p>') !!}
	</div>
</div>