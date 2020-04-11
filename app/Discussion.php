<?php

namespace App;

use App\User;
use App\Channel;
use App\Watcher;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
  protected $fillable = ['title', 'slug', 'content', 'user_id', 'channel_id'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function channel()
  {
    return $this->belongsTo(Channel::class);
  }

  public function replies()
  {
    return $this->hasMany(Reply::class);
  }

  public function watchers()
  {
    return $this->hasMany(Watcher::class);
  }


  public function getRouteKeyName()
  {
    return 'slug';
  }

  public function is_being_watched_by_auth_user()
  {
    $id = auth()->user()->id;

    $watcher_ids = array();

    foreach ($this->watchers as $w) {
      array_push($watcher_ids, $w->user_id);
    }

    if (in_array($id, $watcher_ids)) {
      return true;
    } else {
      return false;
    }
  }
}
