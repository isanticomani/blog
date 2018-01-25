<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Tag;

class TagsController extends Controller
{
  public function index(Request $request){
    $tags = Tag::Search($request->name)->orderBy('id','DECS')->paginate(10);
    return view('admin.tags.index')->with('tags',$tags);
  }

  public function create(){
    return view('admin.tags.create');
  }

  public function edit($id){
    $tag = Tag::find($id);
    return view ('admin.tags.edit')->with('tag',$tag);
  }

  public function store(TagRequest $request){
    $tag = new Tag($request->all());
    $tag->save();

   flash('El tag ' . $tag->name . ' ha sido creado con exito')->success();
   return redirect()->route('tags.index');
  }

  public function destroy($id){
    $tag = Tag::find($id);
    $tag->delete();

    flash('El tag ' . $tag->name . ' ha sido eliminado')->error();
    return redirect()->route('tags.index');
  }

  public function update(Request $request, $id){
    $tag = Tag::find($id);
    $tag->fill($request->all());
    $tag->save();

    flash('El tag ' . $tag->name . ' ha sido editado')->warning();
    return redirect()->route('tags.index');
  }
}
