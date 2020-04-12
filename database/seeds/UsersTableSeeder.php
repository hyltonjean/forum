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
      'name' => 'ADMIN',
      'email' => 'admin@forum.io',
      'password' => bcrypt('admin'),
      'avatar' => asset('img/avatars/admin.jpg'),
      'admin' => 1,
    ]);

    $user1 = \App\User::create([
      'name' => 'John Doe',
      'email' => 'john@doe.com',
      'password' => bcrypt('password'),
      'avatar' => asset('img/avatars/avatar.jpg'),
    ]);

    $user2 = \App\User::create([
      'name' => 'Jane Doe',
      'email' => 'jane@doe.com',
      'password' => bcrypt('password'),
      'avatar' => asset('img/avatars/avatar.jpg'),
    ]);

    $user3 = \App\User::create([
      'name' => 'Michael Knight',
      'email' => 'michael@knight.com',
      'password' => bcrypt('password'),
      'avatar' => asset('img/avatars/avatar.jpg'),
    ]);
  }
}
