@extends('admin.template.main')

@section('title','Login')

@section('content')

  {!! Form::open(['route' => 'admin.auth.login','method' => 'POST' ]) !!}
    <div class="form-group">
      {!! Form::label('email','Correo electronico') !!}
      {!! Form::email('email',null,['class' => 'form-control','placeholder'=>'example@mail.com']) !!}
    </div>

    <div class="form-group">
      {!! Form::label('password','Contraseña') !!}
      {!! Form::password('password',['class' => 'form-control','placeholder'=>'********']) !!}
    </div>

    <div class="form-group">
      {!! Form::submit('Acceder',['class' => 'btn btn-info']) !!}
    </div>
  {!! Form::close() !!}

@endsection
