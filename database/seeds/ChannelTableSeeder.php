<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $channel1 = ['title' => 'Laravel'];
    $channel2 = ['title' => 'Valet'];
    $channel3 = ['title' => 'Nova'];
    $channel4 = ['title' => 'Echo'];
    $channel5 = ['title' => 'Socialite'];
    $channel6 = ['title' => 'Vapor'];
    $channel7 = ['title' => 'Forge'];
    $channel8 = ['title' => 'Homestead'];
    $channel9 = ['title' => 'Spark'];
    $channel10 = ['title' => 'Passport'];

    Channel::create($channel1);
    Channel::create($channel2);
    Channel::create($channel3);
    Channel::create($channel4);
    Channel::create($channel5);
    Channel::create($channel6);
    Channel::create($channel7);
    Channel::create($channel8);
    Channel::create($channel9);
    Channel::create($channel10);
  }
}
