<?php

namespace App\Http\Controllers;

use App\Like;
use App\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
  public function like($id)
  {
    $reply = Reply::find($id);

    Like::create([
      'reply_id' => $reply->id,
      'user_id' => auth()->user()->id,
    ]);

    session()->flash('success', 'You liked the reply.');

    return redirect()->back();
  }

  public function unlike($id)
  {
    $like = Like::where('reply_id', $id)->where('user_id', auth()->user()->id);

    $like->delete();

    session()->flash('success', 'You unliked the reply.');

    return redirect()->back();
  }

  public function best_answer($id)
  {
    $reply = Reply::find($id);

    $reply->best_answer = 1;
    $reply->save();

    $reply->user->points += 100;
    $reply->user->save();

    session()->flash('success', 'Reply has been marked as best answer.');

    return redirect()->back();
  }
}
