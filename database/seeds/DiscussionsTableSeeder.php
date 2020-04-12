<?php

use App\Discussion;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $t1 = 'Implementing OAUTH2 with laravel passport';
    $t2 = 'Pagination in vuejs not working correctly';
    $t3 = 'Laravel Echo event listeners not working as it should';
    $t4 = 'Laravel homestead error - undetected database';

    $d1 = [
      'title' => $t1,
      'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellat facilis, eos, tenetur ipsam, sed nostrum velit recusandae placeat nam inventore accusamus. Laudantium ipsum repudiandae amet? Maiores, non. Laborum placeat fugiat impedit commodi in sequi fugit suscipit, temporibus officiis nam dolore minima id maxime distinctio? Repudiandae autem mollitia consequuntur aliquam quae ab natus odio, officia eligendi dolorum sunt, magni, qui ut. Accusantium quam iure at id accusamus nihil dolore tenetur ea dolorum, dolores non porro, quisquam, dolor odit? Pariatur, illum ipsa molestiae in obcaecati, ducimus reprehenderit earum voluptatibus modi eum maiores quia ut? Hic consectetur voluptatum quas nulla aliquid aliquam!',
      'channel_id' => 10,
      'user_id' => 1,
      'slug' => Str::slug($t1)
    ];

    $d2 = [
      'title' => $t2,
      'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellat facilis, eos, tenetur ipsam, sed nostrum velit recusandae placeat nam inventore accusamus. Laudantium ipsum repudiandae amet? Maiores, non. Laborum placeat fugiat impedit commodi in sequi fugit suscipit, temporibus officiis nam dolore minima id maxime distinctio? Repudiandae autem mollitia consequuntur aliquam quae ab natus odio, officia eligendi dolorum sunt, magni, qui ut. Accusantium quam iure at id accusamus nihil dolore tenetur ea dolorum, dolores non porro, quisquam, dolor odit? Pariatur, illum ipsa molestiae in obcaecati, ducimus reprehenderit earum voluptatibus modi eum maiores quia ut? Hic consectetur voluptatum quas nulla aliquid aliquam!',
      'channel_id' => 2,
      'user_id' => 3,
      'slug' => Str::slug($t2)
    ];

    $d3 = [
      'title' => $t3,
      'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellat facilis, eos, tenetur ipsam, sed nostrum velit recusandae placeat nam inventore accusamus. Laudantium ipsum repudiandae amet? Maiores, non. Laborum placeat fugiat impedit commodi in sequi fugit suscipit, temporibus officiis nam dolore minima id maxime distinctio? Repudiandae autem mollitia consequuntur aliquam quae ab natus odio, officia eligendi dolorum sunt, magni, qui ut. Accusantium quam iure at id accusamus nihil dolore tenetur ea dolorum, dolores non porro, quisquam, dolor odit? Pariatur, illum ipsa molestiae in obcaecati, ducimus reprehenderit earum voluptatibus modi eum maiores quia ut? Hic consectetur voluptatum quas nulla aliquid aliquam!',
      'channel_id' => 4,
      'user_id' => 4,
      'slug' => Str::slug($t3)
    ];

    $d4 = [
      'title' => $t4,
      'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellat facilis, eos, tenetur ipsam, sed nostrum velit recusandae placeat nam inventore accusamus. Laudantium ipsum repudiandae amet? Maiores, non. Laborum placeat fugiat impedit commodi in sequi fugit suscipit, temporibus officiis nam dolore minima id maxime distinctio? Repudiandae autem mollitia consequuntur aliquam quae ab natus odio, officia eligendi dolorum sunt, magni, qui ut. Accusantium quam iure at id accusamus nihil dolore tenetur ea dolorum, dolores non porro, quisquam, dolor odit? Pariatur, illum ipsa molestiae in obcaecati, ducimus reprehenderit earum voluptatibus modi eum maiores quia ut? Hic consectetur voluptatum quas nulla aliquid aliquam!',
      'channel_id' => 8,
      'user_id' => 2,
      'slug' => Str::slug($t4)
    ];

    Discussion::create($d1);
    Discussion::create($d2);
    Discussion::create($d3);
    Discussion::create($d4);
  }
}
