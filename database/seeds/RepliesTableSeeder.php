<?php

use App\Reply;
use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $r1 = [
      'user_id' => 1,
      'discussion_id' => 1,
      'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum consequuntur iure eos sit doloribus quasi animi laboriosam, quidem adipisci officiis. Inventore repellendus minima consequuntur accusamus neque earum, in aliquid. Commodi ea vero hic. Id officiis quia ducimus vitae reiciendis, nobis corrupti omnis praesentium ratione iure temporibus adipisci, sunt optio qui consectetur quod autem iste assumenda dolores, aliquid rerum itaque harum?'
    ];

    $r2 = [
      'user_id' => 1,
      'discussion_id' => 2,
      'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum consequuntur iure eos sit doloribus quasi animi laboriosam, quidem adipisci officiis. Inventore repellendus minima consequuntur accusamus neque earum, in aliquid. Commodi ea vero hic. Id officiis quia ducimus vitae reiciendis, nobis corrupti omnis praesentium ratione iure temporibus adipisci, sunt optio qui consectetur quod autem iste assumenda dolores, aliquid rerum itaque harum?'
    ];

    $r3 = [
      'user_id' => 2,
      'discussion_id' => 3,
      'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum consequuntur iure eos sit doloribus quasi animi laboriosam, quidem adipisci officiis. Inventore repellendus minima consequuntur accusamus neque earum, in aliquid. Commodi ea vero hic. Id officiis quia ducimus vitae reiciendis, nobis corrupti omnis praesentium ratione iure temporibus adipisci, sunt optio qui consectetur quod autem iste assumenda dolores, aliquid rerum itaque harum?'
    ];

    $r4 = [
      'user_id' => 4,
      'discussion_id' => 4,
      'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum consequuntur iure eos sit doloribus quasi animi laboriosam, quidem adipisci officiis. Inventore repellendus minima consequuntur accusamus neque earum, in aliquid. Commodi ea vero hic. Id officiis quia ducimus vitae reiciendis, nobis corrupti omnis praesentium ratione iure temporibus adipisci, sunt optio qui consectetur quod autem iste assumenda dolores, aliquid rerum itaque harum?'
    ];

    Reply::create($r1);
    Reply::create($r2);
    Reply::create($r3);
    Reply::create($r4);
  }
}
