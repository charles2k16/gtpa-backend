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
      $table->json('mentorship_areas');
      $table->string('profile_picture');
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
    Schema::dropIfExists('mentors');
  }
}
