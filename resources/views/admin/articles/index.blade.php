@extends('admin.template.main')

@section('title','Listado de articulos')

@section('content')
	<table class="table table-striped">
	<a href="{{ route('articles.create') }}" class="btn btn-info">Registrar nuevo articulo</a>
	<!-- Buscador de articulos -->
  {!! Form::open(['route' => 'articles.index','method'=>'GET','class'=>'navbar-form pull-right']) !!}
    <div class="input-group">
      {!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Buscar articulo..','aria-describedby'=>'search']) !!}
      <span class="input-group-addon" id="search">
        <span class="glyphicon glyphicon-search" id="search" aria-hidden="true"></span>
      </span>
    </div>
  {!! Form::close() !!}
  <!-- Buscador de articulos -->
	<hr>
		<thead>
			<td>ID</td>
			<td>Titulo</td>
			<td>Categoria</td>
			<td>Usuario</td>
			<td>Accion</td>
		</thead>
		<tbody>
			@foreach($articles as $article)
				<tr>
					<td> {{ $article->id }} </td>
					<td> {{ $article->title }} </td>
					<td> {{ $article->category->name }} </td>
					<td> {{ $article->user->name }} </td>
					<td>
						<a href="{{ route('articles.edit',$article->id) }}" class="btn btn-warning">
              <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
            </a>
            <a href="{{ route('articles.destroy',$article->id) }}" onclick="return confirm('Seguro que quieres eliminar este articulo?')" class="btn btn-danger">
              <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
            </a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="text-center">
		{!! $articles->render() !!}
	</div>
@endsection