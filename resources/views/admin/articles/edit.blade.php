@extends('admin.template.main')

@section('titulo','Editar articulo ' . $article->title)

@section('content')

	{!! Form::open(['route'=>['articles.update',$article], 'method' => 'PUT']) !!}
		<div class="form-group">
			{!! Form::label('title','Titulo') !!}
			{!! Form::text('title',$article->title,['class' => 'form-control', 'placeholder' => 'Titulo del articulo', 'required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('category_id','Categoria') !!}
			{!! Form::select('category_id', $categories, $article->category->id, ['class' => 'form-control select-category', 'required'] ) !!}
		</div>

		<div class="form-group">
			{!! Form::label('content','Contenido') !!}
			{!! Form::textarea('content',$article->content,['class'=>'form-control textarea-content']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('tags','Tags') !!}
			{!! Form::select('tags[]',$tags,$mytags,['class'=> 'form-control select-tag','multiple','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Guardar articulo', ['class' => 'btn btn-primary']) !!}
		</div>
	{!! Form::close() !!}
@endsection

@section('js')
	<script>
		$('.select-tag').chosen({
			placeholder_text_multiple: 'Seleccione un maximo de 3 tags',
			max_selected_options : 3,
			search_contains : true,
			no_results_text : 'No se encontraron los tags'
		});

		$('.select-category').chosen({
			placeholder_text_single : 'Seleccione una opcion'
		});

		$('.textarea-content').trumbowyg();
	</script>
@endsection