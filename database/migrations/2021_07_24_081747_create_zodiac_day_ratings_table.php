<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZodiacDayRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zodiac_day_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zodiac_sign_id');
            $table->date('zodiac_date');
            $table->unsignedBigInteger('day_score');
            $table->timestamps();

            $table->foreign('zodiac_sign_id')->references('id')->on('zodiac_signs');
            $table->foreign('day_score')->references('id')->on('zodiac_scores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zodiac_day_ratings');
    }
}
