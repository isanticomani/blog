<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
  public function index(){
    $users = User::orderBy('id','ASC')->paginate(20);
    return view('admin.users.index')->with('users',$users);
  }

  public function create(){
    return view('admin.users.create');
  }

  public function store(UserRequest $request){
    //dd($request->all());
    $user = new User($request->all());
    $user->password = bcrypt($request->password);
    //dd($user);
    $user->save();
    //dd('Usuario registrado');
    flash('Se ha registrado ' . $user->name . ' de forma exitosa.')->success();
    return redirect()->route('users.index');
  }

  public function show($id){
    //
  }

  public function destroy($id){
    $user = User::find($id);
    $user->delete();

    flash('El usuario ' . $user->name . ' ha sido eliminado!')->error();
    return redirect()->route('users.index');
  }

  public function update(Request $request, $id){
    $user = User::find($id);
    $user->fill($request->all());
    //$user->name = $request->name;
    //$user->email = $request->email;
    //$user->type = $request->type;
    $user->save();

    flash('El usuario ' . $user->name . ' ha sido actualizado!')->success();
    return redirect()->route('users.index');
  }

  public function edit($id){
    $user = User::find($id);
    return view('admin.users.edit')->with('user',$user);
  }
}
