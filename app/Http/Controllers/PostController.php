<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        // auth is for means that only authenticated users can access these pages
        // guest is for means that only guest users can access these pages

    }

    public function index()
    {
        //create a variable and store all the blog posts in it from the database
        $posts = Post::OrderBy('id', 'desc')->paginate(5);
        //it would pass in however many items you want on the page
        //asc向上排序 desc向下排序

        //then return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd:die and dump, laravelPHP, pass a variable, 意指終結以下行程，並把dd裡的變數呈現在螢幕上
        // dd($request);

        // validate the data
        $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255',
                //The field under validation may have alpha-numeric characters, as well as dashes and underscores. as well as和..一樣
                'body'  => 'required',
                'category_id' => 'required|integer'


        ));

        // store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->category_id = $request->category_id;

        $post->save();

        // tags():model function
        // sync(array, t/f):create that relationship and syncs it up
        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'the blog post was successfully save！');

        // redirect to another page
        return redirect()->route('posts.show', $post->id);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save it as a variable
        $post = Post::find($id);
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tags2 = [];
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

        //return the view and pass in the var we previously created
        return view('posts.edit')->withPost($post)->withCats($cats)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = POST::find($id);
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'category_id' => 'required|integer',
                'body'  => 'required'
            ));
        }else{
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                //unique:table,column. unique is going to take the most time is this unique seeing if the items unique searching the database
                'category_id' => 'required|integer',
                'body'  => 'required'

            ));
        }
        dd($request);
        // Validate the data
        

        // Save the data to the database
        $post = Post::find($id);
        //we are not going to start a new Post, we need to do is go out and find 
        //the existing Post and than save the changes on top of the existing Post
        //store as work is saving a brand new row to the database and update is just updating an existing row
        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');
        
        //laravel will automatically update the timestamp for updated at every time we make
        $post->save();
        //isset(check it is exist)

        //only the IDs in the given array will exist in the intermediate table
        $post->tags()->sync($request->tags);        
        
        // set flash data with success message
        Session::flash('success', 'this post was sucessfully saved');

        // redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = POST::find($id);
        $post->tags()->detach();
        $post->delete();

        Session::flash('success', 'The post was successfully deleted');
        return redirect()->route('posts.index');
    }
}
