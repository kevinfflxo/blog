<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

| the routes files what we are going to be working with for the most part
to actually find certain Urls and then send it to the right places

*/

// it's already be done by default
Route::group(['middleware' => ['web']], function() {

	// Authentication Routes
	Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
	// when we submit our login, so that's a post request
	// you need to create a folder called auth, and make sure you have all the spelling this correctly because it's laravel convention
	Route::post('auth/login', 'Auth\LoginController@login');
	Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);


	// Registration Routes
	Route::get('auth/register', ['as' => 'register','uses' => 'Auth\RegisterController@showRegistrationForm']);
	Route::post('auth/register', 'Auth\RegisterController@register');


	// Password Reset Routes
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
	Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
	// When we generates the token, it'll automatically add the token at then end of password slash reset, and then slash the token, and that's what we identify that someone's alreday authenticated via email, they have their token and that's going to trigger laravel to go match the token, and display the correct the view someone can reset them password. Question mark here is because not every single time will have a token, so we are basically have creating two URLs here, we're creating password slash reset and password slash reset any slash number(token) at the end of it. The question mark inside of here indicates that this is optional that the token might not exist.
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset');

	// Categories
	Route::resource('categories', 'CategoryController', ['except' => ['create']]);
	Route::resource('tags', 'TagController', ['except' => ['create']]);
	//except <=> only, all of the functions that we from our resource controller that we don't want to use

	//Comments
	Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
	Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
	Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
	Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);

	Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
	// we are going to name the route in second parameter
	// closure means is that it's saying that it doesn't link to any specific, it doesn't go anywhere
	// W：any word character, D：any number character, +：restrict them, add above all restrict
	// where：for example slug equal to...
	Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);
	Route::get('/', 'PagesController@getIndex');
	Route::get('about', 'PagesController@getAbout');
	Route::get('contact', 'PagesController@getContact');
	Route::post('contact', ['as' => 'contact', 'uses' => 'PagesController@postContact']);

	Route::get('create', 'PagesController@getCreate');
	Route::resource('posts', 'PostController');
});