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
      $table->date('age');
      $table->string('name');
      $table->string('firstName');
      $table->string('lastName');
      $table->string('address');
      $table->string('email');
      $table->string('title');
      $table->string('occupation',50);
      $table->string('organization',50);
      $table->string('industry');
      $table->integer('years_of_exp');
      $table->string('expertise');
      $table->text('bio');
      $table->string('country');
      $table->string('city',50);
      $table->string('state',50);
      $table->string('postCode');
      $table->string('source');
      $table->boolean('mentored_before')->default(false);
      $table->string('if_yes_explain')->nullable();
      $table->boolean('support_on_how_to_mentor')->default(false);
      $table->string('why_do_you_want_to_mentor');
      $table->integer('phone_number');
      $table->string('pic')->nullable();
      $table->string('mentorship_areas');
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
