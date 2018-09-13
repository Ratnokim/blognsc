@extends('layouts.admin.app2')

@section('assets-top')
@endsection


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        MY PROFILE
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">My Profile</a></li>
        <li class="active">{{ Auth::user()->name }}</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">



          {!! Form::model(auth()->user(), ['url' => url('/admin/profile'),
                    'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
                    @include('layouts._flash')
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
              <div class="box-body box-profile">
               
                <img class="img-responsive" style="padding-bottom: 20px;" src="{{asset('img/'.Auth::user()->avatar) }}" alt="User profile picture">

                <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                  {!! Form::label('avatar', 'Avatar', ['class'=>'col-md-3 control-label']) !!}
                  <div class="col-md-4">
                    {!! Form::file('avatar') !!}
                    {!! $errors->first('avatar', '<p class="help-block">:message</p>') !!}
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>

          <div class="col-md-5">

            <!-- Profile Image -->
            <div class="box box-primary">
              <div class="box-body box-profile">

                @include('admin.profile._form')
               
                {!! Form::submit('Simpan', ['class'=>'btn btn-primary btn-block']) !!}
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>

        {!! Form::close() !!}
        
      </div>

    </section>
 
@endsection