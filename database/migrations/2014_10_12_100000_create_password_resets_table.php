<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();

            // when you click forgot my password the way this works is you're gonna type in an email address into a form and we'll set up all these view these uniforms as views, so that you know we can control what you're seeing, but basically when you click forget my password it takse you to a view and the on the website, in that view it's got a single form field, it asks for your email, you type in your email when you click submit, it's gonna obviously go to controller, if the controller is then gonna take that email value, look for someone in the database, that has that email, it's gonna match it up, it's gonna create an item in this password resets columns with that email address, and it's gonna give it a random token, send them off an email with a URL, that incorporates that random token, that's stored in the database and then when you click that link in their email, it takes you back to the website and just like to remember me functionality where you're taking the cookies long hash value and matching to a database hash value that's kind of the security aspect of remember me. You're doing the similar thing here where basically when you click that link to reset your password, it's going to compare that token with the token that's the token, that's in the URL to the token that's in the database in this column here. If those both match up, then you're valid you're allowed to reset your password.

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
}
