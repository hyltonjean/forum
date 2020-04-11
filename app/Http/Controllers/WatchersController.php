<?php

namespace App\Http\Controllers;

use App\Watcher;
use Illuminate\Http\Request;

class WatchersController extends Controller
{
    public function watch($id)
    {
      Watcher::create([
        'discussion_id' => $id,
        'user_id' => auth()->user()->id,
      ]);

      session()->flash('success', 'You are watching this discussion.');

      return redirect()->back();
    }

    public function unwatch($id)
    {
      $watcher = Watcher::where('discussion_id', $id)->where('user_id', auth()->user()->id);

      $watcher->delete();

      session()->flash('success', 'You are no longer watching this discussion.');

      return redirect()->back();
    }
}
