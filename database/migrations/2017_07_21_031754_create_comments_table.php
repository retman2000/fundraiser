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
            $table->integer('fundraiser_id', false, true);
            $table->integer('user_id', false, true);
            $table->unique(['fundraiser_id','user_id'],'unique_fundraiser_user');
            $table->text('comment');
            $table->float('rating', 3, 2);
            $table->timestamps();
            
            // TODO: create a unique key based off of fundraiser_id and user_id.
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
