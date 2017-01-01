<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('book_id');
            $table->string('title');
            $table->integer('pages_count')->unsigned();
            $table->date('published_date');
            $table->decimal('price', 5, 2);
            $table->smallInteger('quantity');
            $table->timestamps();
            $table->integer('author_id')->unsigned();
            $table->integer('field_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->engine = 'InnoDB';
        });
        
        Schema::table('books', function($table) {
            $table->foreign('field_id')->references('field_id')->on('fields');
            $table->foreign('language_id')->references('language_id')->on('languages');
            $table->foreign('author_id')->references('author_id')->on('authors')->onDelete('cascade'); 
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
