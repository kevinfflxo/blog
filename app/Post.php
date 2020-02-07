<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {	
    	return $this->belongsTo('App\Category');

    	/*<?php

		namespace App;

		use Illuminate\Database\Eloquent\Model;

		class Phone extends Model
		{
		    public function user()
		    {
		        return $this->belongsTo('App\User');
		    }
		}
		In the example above, Eloquent will try to match the user_id from the Phone model to an id on the User model. Eloquent determines the default foreign key name by examining the name of the relationship method and suffixing the method name with _id. However, if the foreign key on the Phone model is not user_id, you may pass a custom key name as the second argument to the belongsTo method:

		If your parent model does not use id as its primary key, or you wish to join the child model to a different column, you may pass a third argument to the belongsTo method specifying your parent table's custom key:*/
    }
   
    public function tags()
    {
   		return $this->belongsToMany('App\Tag');
    }

    public function comments()
    {
   		return $this->hasMany('App\Comment');
    }
}
