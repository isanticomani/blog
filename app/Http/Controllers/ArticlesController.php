<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\ArticleRequest;

use App\Category;
use App\Tag;
use App\Article;
use App\Images;

use Flash;

class ArticlesController extends Controller
{

	public function destroy($id){
		$article = Article::find($id);
    $article->delete();
    flash('El articulo ' . $article->title . ' ha sido eliminado')->error();
    return redirect()->route('articles.index');
	}

	public function update(Request $request, $id){
		$article = Article::find($id);
		$article->fill($request->all());
		$article->save();

		$article->tags()->sync($request->tags);
		flash('Se ha editado el articlulo ' . $article->title . ' de forma existosa')->warning();
		return redirect()->route('articles.index');
	}

	public function edit($id){
		$article = Article::find($id);
		$article->category;
		$categories = Category::orderBy('name','DESC')->pluck('name','id');
		$tags = Tag::orderBy('name','DESC')->pluck('name','id');

		$mytags = $article->tags->pluck('id')->toArray();

		return view('admin.articles.edit')->with('categories',$categories)->with('article',$article)->with('tags',$tags)->with('mytags',$mytags);
	}

	public function create(){
		$categories = Category::orderBy('name','ASC')->pluck('name','id');
		$tags = Tag::orderBy('name','ASC')->pluck('name','id');
		return view('admin.articles.create')->with('categories',$categories )->with('tags',$tags);
	}

	public function store(ArticleRequest $request){
		if ($request->file('image')) {
			// Manipulacion de archivos
			$file = $request->file('image');
			$name = 'blogfacilito_' . time() .'.' .$file->getClientOriginalExtension();
			$path = public_path() . '/images/articles/';
			$file->move($path,$name);
		}

		$article = new Article($request->all());
		$article->user_id = \Auth::user()->id;
		$article->save();

		$article->tags()->sync($request->tags);

		$image = new Images();
		$image->name = $name;
		$image->article()->associate($article);
		$image->save();

		flash('Se ha creado el articulo ' . $article->title . ' de forma satisfactoria')->success();
		return redirect()->route('articles.index');

	}

	public function index(Request $request){
		$articles = Article::Search($request->title)->orderBy('id','DESC')->paginate(5);
		$articles->each(function ($articles){
			$articles->category;
			$articles->user;
		});
		return view('admin.articles.index')->with('articles',$articles);
	}
}
