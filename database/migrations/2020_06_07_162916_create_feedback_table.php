<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('feedback', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('mentor_id')->index()->nullable();
      $table->integer('mentee_id')->index()->nullable();
      $table->text('mentor_feedback')->nullable();
      $table->text('mentee_feedback')->nullable();
      $table->boolean('sent')->default(false);
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
    Schema::dropIfExists('feedback');
  }
}
