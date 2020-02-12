<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{

	public function getIndex(){
		$posts = POST::paginate(2);
		//paginate it's come from model

		return view('blog.index')->withPosts($posts);


	}

    public function getSingle($slug) {
    	// fetch from the DB based on slug
    	$post = POST::where('slug', '=', $slug)->first();
    	// there's really no point in get grabbing a collection object because when you do the get what it says it creates basically a collection object which is kind of like an array, so even if you have one object, it's like nested inside of this group object, which means the only way to get into it is through like a loop or something, and first just says get the first one and stop, it as a single post object instead of a collection post object

    	// then return the view and pass in the post object
    	return view('blog.single')->withPost($post);
    }
}