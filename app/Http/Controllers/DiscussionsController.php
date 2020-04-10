<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Discussion;
use Illuminate\Support\Str;
use App\Http\Requests\CreateDiscussionsRequest;
use App\Http\Requests\UpdateDiscussionsRequest;
use App\Reply;

class DiscussionsController extends Controller
{
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
  public function show($slug)
  {
    $discussion = Discussion::where('slug', $slug)->first();

    return view('discussions.show')->with('discussion', $discussion);
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }

  public function reply($id)
  {
    $reply = Reply::where('id', $id)->first();

    $reply->create([
      'user_id' => auth()->user()->id,
      'discussion_id' => $id,
      'content' => request()->reply,
    ]);

    session()->flash('success', 'Reply added successfully');

    return redirect()->back();
  }
}
