<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Mail\OrderShipped;
use App\Post;
use App\User;

class PagesController extends Controller {
	
	public function getIndex() {
		$posts = POST::orderBy('created_at', 'desc')->take(4)->get();
		// post model is already defined to use the posts table, so you don't have to do DB table
		// if you've actually omit any sort of select statement it automatically assumes select start

		return view('pages.welcome')->withPosts($posts);
	}
	
	public function getAbout() {
		
		$first = 'kevin';
		$last = 'zhong';
		
		$fullName = $first . " " . $last;
		$email = 'kevin0507a@gmail.com';
		$data = [];
		$data['fullName'] = $fullName;
		$data['email'] = $email;
		return view('pages.about')->withData($data);
	}
	
	public function getContact() {
		return view('pages.contact');
	}

	public function postContact(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10'
		]);
		$user = User::find(3);



	
		Mail::to($request->email)->send(new OrderShipped($request));
	}

	public function getCreate() {
		return view('posts.create');
	}
}