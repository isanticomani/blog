@extends('admin.template.main')

@section('title','Agregar categoria')

@section('content')
  {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
    <div class="form-group">
      {!! Form::label('name','Nombre') !!}
      {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre de la categoria','required']) !!}
      {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
    </div>
  {!! Form::close() !!}
@endsection
