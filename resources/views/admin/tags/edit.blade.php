@extends('admin.template.main')

@section('title','Editar tag ' . $tag->name)

@section('content')

  {!! Form::open(['route' => ['tags.update',$tag],'method' => 'PUT']) !!}

    <div class="form-group">
      {!! Form::label('name','Nombre') !!}
      {!! Form::text('name',$tag->name,['class' => 'form-control','placeholder' => 'Nombre de tag','required']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
    </div>

  {!! Form::close() !!}

@endsection
