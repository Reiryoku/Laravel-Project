<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seasons', function (Blueprint $table) {
            $table->increments('id');
			$table->string('air_date', 255)->nullable();
			$table->string('name', 255)->nullable();
			$table->text('overview')->nullable();
			$table->string('poster_path', 255)->nullable();
			$table->integer('season_number')->default(1);
			$table->bigInteger('tvshow_id')->unsigned();
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
        Schema::dropIfExists('seasons');
    }
}
