@extends('layouts.admin.app2')

@section('assets-top')
@endsection


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cange Password
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Profile</a></li>
        <li class="active><a href="#">Cange Password</a></li>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row center">



        {!! Form::open(['url' => url('/admin/password'),
                  'method' => 'post', 'class'=>'form-horizontal']) !!}
                    @include('layouts._flash')
          <div class="col-md-6">

            <!-- Profile Image -->
            <div class="box box-primary">
              <div class="box-body box-profile">
               
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  {!! Form::label('password', 'Password Lama', ['class'=>'col-md-4 control-label']) !!}
                  <div class="col-md-8">
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                  {!! Form::label('new_password', 'Password Baru', ['class'=>'col-md-4 control-label']) !!}
                  <div class="col-md-8">
                    {!! Form::password('new_password',['class'=>'form-control']) !!}
                    {!! $errors->first('new_password', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
                  {!! Form::label('new_password_confirmation', 'Konfirmasi Password Baru', ['class'=>'col-md-4 control-label']) !!}
                  <div class="col-md-8">
                    {!! Form::password('new_password_confirmation',['class'=>'form-control']) !!}
                    {!! $errors->first('new_password_confirmation', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6 col-md-offset-4">
                    {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>

        {!! Form::close() !!}
        
      </div>

    </section>
 
@endsection