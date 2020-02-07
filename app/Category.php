<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   	protected $table = 'Categories';

   	public function posts(){
   		return $this->hasMany('App\Post');
   		/*
   		second argument:Eloquent will take the "snake case" name of the owning model and suffix it with _id
   		Additionally, Eloquent assumes that the foreign key should have a value matching the id column of the parent.  If you would like the relationship to use a value other than id, you may pass a third argument to the hasOne(hasMany) method specifying your custom key.
		return $this->hasOne('App\Phone', 'foreign_key', 'local_key');
   		*/
   	}
}
