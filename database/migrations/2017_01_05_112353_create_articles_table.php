<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); // FK
            $table->string('title');
            $table->text('body');
            $table->timestamps();
            $table->timestamp('published_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              // If the user deletes their account, delete their articles too.
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
