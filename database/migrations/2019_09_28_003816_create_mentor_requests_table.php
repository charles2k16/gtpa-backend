<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\MentorRequest;

class CreateMentorRequestsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('mentor_requests', function (Blueprint $table) {
      $table->increments('id');
      $table->text('description');
      $table->string('duration');
      $table->string('status')->index()->default(MentorRequest::PENDING_STATUS);
      $table->integer('mentor_id')->index()->nullable();
      $table->integer('mentee_id')->index()->nullable();
      $table->date('commencement_date');
      $table->text('reasons_for_reject');
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
    Schema::dropIfExists('mentor_requests');
  }
}
