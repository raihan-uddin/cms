<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Post;
use App\Tag;

class WelcomeController extends Controller
{
    public function index()
    {

		$search = request()->query('search');
    	if($search){
    		//dd(request()->query('search'));
    		$posts = Post::where('title', 'LIKE', "%{$search}%")->simplePaginate(3);
    	} else{
			$posts = Post::simplePaginate(3);
    	}
    	return view('welcome')
    	->with('categories', Category::all())
    	->with('posts', $posts)
    	->with('tags', Tag::all());
    }
}
