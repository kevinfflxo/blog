<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->boolean('approved');
            $table->integer('post_id')->unsigned();
            $table->timestamps();  
            //cascade delete this references
        });

        Schema::table('comments', function(Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->dropForeign(['post_id']);
            // 不知其用處
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('comments');
    }
}
