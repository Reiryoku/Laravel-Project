<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTvshowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tvshows', function (Blueprint $table) {
            $table->increments('id');			
			$table->string('backdrop_path', 255)->nullable();
			$table->string('creators', 255)->nullable();
			$table->string('episode_runtime', 255)->nullable();
			$table->string('first_air_date', 255)->nullable();
			$table->string('genres', 255)->nullable();
			$table->string('homepage', 255)->nullable();
			$table->bigInteger('tmdb_id')->unsigned()->nullable();
			$table->string('languages', 255)->nullable();
			$table->string('last_air_date', 255)->nullable();
			$table->string('name', 255);
			$table->string('networks', 255)->nullable();
			$table->string('number_of_episodes', 255)->nullable();
			$table->string('number_of_seasons', 255)->nullable();
			$table->string('origin_country', 255)->nullable();		
			$table->string('original_language', 255)->nullable();
			$table->string('original_name', 255)->nullable();
			$table->text('overview')->nullable();
			$table->float('tmdb_popularity', 50)->unsigned()->nullable();
			$table->string('poster_path', 255)->nullable();
			$table->string('production_companies', 255)->nullable();
			$table->string('status', 255)->nullable();
			$table->string('type', 255)->nullable();
			$table->string('tmdb_vote_average', 3)->nullable();
			$table->float('tmdb_vote_count', 50)->unsigned()->nullable();
			$table->string('trailer', 255)->nullable();
			$table->string('imdb_id', 255)->nullable();
			$table->string('tvdb_id', 255)->nullable();
			$table->string('tvrage_id', 255)->nullable();
			$table->string('slug')->unique();			
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
        Schema::dropIfExists('tvshows');
    }
}
