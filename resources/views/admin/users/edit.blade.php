@extends('admin.template.main')

@section('title', 'Editar Usuario ' . $user->name)

@section('content')
  {!! Form::open(['route' => ['users.update',$user], 'method' => 'PUT']) !!}
    <div class="form-group">
      {!! Form::label('name', 'Nombre') !!}
      {!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nombre','required']) !!}
    </div>
    <div class="Form-group">
      {!! Form::label('email','Correo Electronico') !!}
      {!! Form::email('email',$user->email,['class' => 'form-control', 'placeholder' => 'example@gmail.com','required']) !!}
    </div>
    <div class="Form-group">
      {!! Form::label('type','Tipo') !!}
      {!! Form::select('type',['member'=>'Miembro','admin'=>'Administrador'],$user->type,['class'=>'form-control']) !!}
    </div>
    <div class="Form-group">
      {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
@endsection
