<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Mentor;
use App\Mentee;
use App\MentorRequest;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    DB::statement('SET FOREIGN_KEY_CHECKS = 0');

    User::truncate();
    Mentor::truncate();
    Mentee::truncate();
    MentorRequest::truncate();

    $usersQuantity = 20;
    $mentorsQuantity = 8;
    $menteesQuantity = 15;
    $requestsQuantity = 17;
   
    factory(User::class, $usersQuantity)->create();
    factory(Mentor::class, $mentorsQuantity)->create();
    factory(Mentee::class, $menteesQuantity)->create();
    factory(MentorRequest::class, $requestsQuantity)->create();
  }
}
