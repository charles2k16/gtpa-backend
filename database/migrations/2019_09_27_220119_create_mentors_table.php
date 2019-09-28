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
      $table->string('title', 20);
      $table->string('occupation',50);
      $table->string('organization',50);
      $table->text('bio');
      $table->string('country',50);
      $table->string('city',50);
      $table->integer('phone_number');
      $table->enum('mentorship_areas', array('IT/Technology', 'Business/Finance'));
      $table->string('profile_picture',255);
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
