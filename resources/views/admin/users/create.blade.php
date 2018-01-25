@extends('admin.template.main')

@section('title', 'Crear Usuario')

@section('content')

  {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
    <div class="form-group">
      {!! Form::label('name', 'Nombre') !!}
      {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre','required']) !!}
    </div>

    <div class="Form-group">
      {!! Form::label('email','Correo Electronico') !!}
      {!! Form::email('email',null,['class' => 'form-control', 'placeholder' => 'example@gmail.com','required']) !!}
    </div>

    <div class="Form-group">
      {!! Form::label('password','Contraseña') !!}
      {!! Form::password('password',['class'=>'form-control','placeholder'=>'********']) !!}
    </div>

    <div class="Form-group">
      {!! Form::label('type','Tipo') !!}
      {!! Form::select('type',['member'=>'Miembro','admin'=>'Administrador'],null,['class'=>'form-control','placeholder'=>'Selecione una opcion','required']) !!}
    </div>

    <div class="Form-group">
      {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}

@endsection
