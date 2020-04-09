<?php

namespace App;

use App\User;
use App\Channel;
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

  public function getRouteKeyName()
  {
    return 'slug';
  }
}
