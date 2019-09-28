<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMentorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('mentors', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->index()->unsigned();
      $table->string('title');
      $table->string('occupation',50);
      $table->string('organization',50);
      $table->text('bio');
      $table->string('country');
      $table->string('city',50);
      $table->integer('phone_number');
      $table->enum('mentorship_areas', ['easy', 'hard']);
      $table->string('profile_picture');
      $table->timestamps();

      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('mentors');
  }
}
