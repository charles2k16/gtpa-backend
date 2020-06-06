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
      $table->date('age');
      $table->string('name');
      $table->string('firstName');
      $table->string('lastName');
      $table->string('address');
      $table->string('email');
      $table->string('source');
      $table->string('education');
      $table->string('qualification');
      $table->boolean('graduated')->default(false);
      $table->string('year_completed');
      $table->boolean('mentored_before')->default(false);
      $table->longText('why_do_you_want_to_be_mentored');
      $table->boolean('field_mentored')->default(false);
      $table->boolean('out_of_field_mentored')->default(false);
      $table->string('title');
      $table->string('occupation', 50);
      $table->string('organization', 50);
      $table->longText('bio');
      $table->string('country');
      $table->string('city', 50);
      $table->string('state',50);
      $table->string('postCode');
      $table->string('explain')->nullable();
      $table->string('pic');
      $table->integer('phone_number');
      $table->json('mentorship_areas');
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
    Schema::dropIfExists('mentees');
  }
}
