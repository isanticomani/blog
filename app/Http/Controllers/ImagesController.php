<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Images;

class ImagesController extends Controller
{
	public function index(){
		$images = Images::all();
		$images->each(function ($images){
			$images->article;
		});
		return view('admin.images.index')->with('images',$images);
	}
}
