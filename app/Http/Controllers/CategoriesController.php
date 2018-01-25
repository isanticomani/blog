<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;

class CategoriesController extends Controller
{
  public function create(){
    return view('admin.categories.create');
  }

  public function store(CategoryRequest $request){
    $category = new Category($request->all());
    $category->save();

    flash('La categoria ' . $category->name . ' ha sido creada con exito!')->success();
    return redirect()->route('categories.index');
  }

  public function index(){
    $categories = Category::orderBy('id','DESC')->paginate(10);
    return view('admin.categories.index')->with('categories',$categories);
  }

  public function destroy($id){
    $category = Category::find($id);
    $category->delete();
    flash('La categoria ' . $category->name . ' ha sido eliminada')->error();
    return redirect()->route('categories.index');
  }

  public function edit($id){
    $category = Category::find($id);
    return view('admin.categories.edit')->with('category',$category);
  }

  public function update(Request $request,$id){
    $category = Category::find($id);
    $category->fill($request->all());
    $category->save();
    flash('La categoria ' . $category->name . ' ha sido actualizada')->important();
    return redirect()->route('categories.index');
  }
}
