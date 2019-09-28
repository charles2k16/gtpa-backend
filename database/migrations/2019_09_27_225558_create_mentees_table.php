<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenteesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('mentees', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('user_id')->index()->unsigned();
      $table->tinyInteger('age');
      $table->string('occupation', 50);
      $table->string('organization', 50);
      $table->longText('bio');
      $table->string('country', 50);
      $table->string('city', 50);
      $table->integer('phone_number');
      $table->enum('mentorship_areas', array('foo', 'bar'));
      $table->string('profile_picture', 255);
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
    Schema::dropIfExists('mentees');
  }
}
