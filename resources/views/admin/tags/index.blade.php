@extends('admin.template.main')

@section('title','Listado de tags')

@section('content')
  <a href="{{ route('tags.create') }}" class="btn btn-info">Registrar nueva tag</a>
  <!-- Buscador de tags -->
  {!! Form::open(['route' => 'tags.index','method'=>'GET','class'=>'navbar-form pull-right']) !!}
    <div class="input-group">
      {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar tag..','aria-describedby'=>'search']) !!}
      <span class="input-group-addon" id="search">
        <span class="glyphicon glyphicon-search" id="search" aria-hidden="true"></span>
      </span>
    </div>
  {!! Form::close() !!}
  <!-- Buscador de tags -->
  <hr>
  <table class="table table-triped">
    <thead>
      <th> ID </th>
      <th> Nombre </th>
      <th> Accion </th>
    </thead>
    <tbody>
      @foreach($tags as $tag)
        <tr>
          <td> {{ $tag->id }} </td>
          <td> {{ $tag->name }} </td>
          <td>
            <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-warning">
              <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
            </a>
            <a href="{{ route('tags.destroy',$tag->id) }}" onclick="return confirm('Seguro que quieres eliminar este tag?')" class="btn btn-danger">
              <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
            </a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div class ="text-center">
    {!! $tags->render() !!}
  </div>
@endsection
