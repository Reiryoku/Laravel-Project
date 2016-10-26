<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');			
			$table->string('backdrop', 255)->nullable();
			$table->string('budget', 255)->nullable();
			$table->string('genres', 255)->nullable();
			$table->string('homepage', 255)->nullable();
			$table->bigInteger('tmdb_id')->unsigned()->nullable();
			$table->string('imdb_id', 255)->nullable();
			$table->string('original_language', 255)->nullable();
			$table->string('original_title', 255)->nullable();
			$table->text('overview')->nullable();
			$table->float('tmdb_popularity', 50)->unsigned()->nullable();
			$table->string('poster', 255)->nullable();
			$table->string('production_companies', 255)->nullable();
			$table->string('production_countries', 255)->nullable();
			$table->string('release_date', 255)->nullable();
			$table->string('revenue', 255)->nullable();
			$table->string('runtime', 255)->nullable();
			$table->string('spoken_languages', 255)->nullable();
			$table->string('status', 255)->nullable();
			$table->string('tagline', 255)->nullable();
			$table->string('title', 255);	
			$table->string('tmdb_vote_average', 3)->nullable();
			$table->float('tmdb_vote_count', 50)->unsigned()->nullable();
			$table->string('awards', 255)->nullable();
			$table->string('trailer', 255)->nullable();			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
