<?php

namespace App\Http\Controllers;

use App\User;
use App\Reply;
use App\Channel;
use App\Discussion;
use Illuminate\Support\Str;
use App\Notifications\NewReplyAdded;
use App\Http\Requests\CreateRepliesRequest;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\CreateDiscussionsRequest;
use App\Http\Requests\UpdateDiscussionsRequest;

class DiscussionsController extends Controller
{
  public function __construct()
  {
    $this->middleware(['auth'])->only(['edit', 'store', 'update', 'create']);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('discussions.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateDiscussionsRequest $request)
  {
    auth()->user()->discussions()->create([
      'title' => $request->title,
      'content' => $request->content,
      'channel_id' => $request->channel_id,
      'slug' => Str::slug($request->title),
    ]);

    session()->flash('success', 'Discussion created successfully.');

    return redirect()->back();
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Discussion $discussion)
  {
    // $discussion = Discussion::where('slug', $slug)->first();
    $best_answer = $discussion->replies()->where('best_answer', 1)->first();

    return view('discussions.show')
      ->with('discussion', $discussion)
      ->with('best_answer', $best_answer);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Discussion $discussion)
  {
    return view('discussions.create')->with('discussion', $discussion);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateDiscussionsRequest $request, Discussion $discussion)
  {

    $discussion->title = $request->title;
    $discussion->content = $request->content;
    $discussion->channel_id = $request->channel_id;
    $discussion->slug = Str::slug($request->title);

    $discussion->save();


    session()->flash('success', 'Updated discussion successfully.');

    return redirect('/forum');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Discussion $discussion)
  {
    $discussion->delete();

    session()->flash('success', 'Discussion deleted successfully.');

    return redirect('/forum');
  }

  public function reply(CreateRepliesRequest $request, $id)
  {
    $d = Discussion::find($id);

    $reply = Reply::create([
      'user_id' => auth()->user()->id,
      'discussion_id' => $id,
      'content' => $request->reply,
    ]);

    $reply->user->points += 25;
    $reply->user->save();

    $watchers = array();

    foreach ($d->watchers as $watcher) {
      array_push($watchers, User::find($watcher->user_id));
    }

    Notification::send($watchers, new NewReplyAdded($d));

    session()->flash('success', 'Replied to discussion.');

    return redirect()->back();
  }

  public function reply_edit($id)
  {
    $reply = Reply::find($id);

    return view('replies.edit')->with('reply', $reply);
  }

  public function reply_update(CreateRepliesRequest $request, $id)
  {
    $reply = Reply::find($id);

    $reply->content = $request->content;
    $reply->save();

    session()->flash('success', 'Reply has been updated.');

    return redirect(route('discussions.show', $reply->discussion->slug));
  }
}
