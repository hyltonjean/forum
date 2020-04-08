<?php

namespace App;

use App\User;
use App\Discussion;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
  protected $fillable = ['content', 'user_id', 'discussion_id'];

  public function discussion()
  {
    return $this->belongsTo(Discussion::class);
  }
}
