<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $admin = \App\User::create([
      'name' => 'admin',
      'email' => 'admin@laravel-forum.io',
      'password' => bcrypt('admin'),
      'avatar' => asset('img/avatars/admin.jpg'),
      'admin' => 1,
    ]);
  }
}
