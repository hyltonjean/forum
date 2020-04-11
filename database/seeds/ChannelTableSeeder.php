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
    $channel1 = ['title' => 'Laravel', 'slug' => Str::slug('Laravel') ];
    $channel2 = ['title' => 'Vuejs', 'slug' => Str::slug('Vuejs') ];
    $channel3 = ['title' => 'Nova', 'slug' => Str::slug('Nova') ];
    $channel4 = ['title' => 'Echo', 'slug' => Str::slug('Echo') ];
    $channel5 = ['title' => 'Socialite', 'slug' => Str::slug('Socialite') ];
    $channel6 = ['title' => 'Vapor', 'slug' => Str::slug('Vapor') ];
    $channel7 = ['title' => 'Forge', 'slug' => Str::slug('Forge') ];
    $channel8 = ['title' => 'Homestead', 'slug' => Str::slug('Homestead') ];
    $channel9 = ['title' => 'Spark', 'slug' => Str::slug('Spark') ];
    $channel10 = ['title' => 'Passport', 'slug' => Str::slug('Passport') ];

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
