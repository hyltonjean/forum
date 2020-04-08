<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Http\Requests\CreateChannelsRequest;

class ChannelsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('channels.index')->withChannels(Channel::all());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Channel $channel)
  {
    return view('channels.create')->withChannel($channel);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateChannelsRequest $request)
  {
    $channel = Channel::create([
      'title' => $request->title
    ]);

    session()->flash('success', 'Channel created successfully.');

    return redirect('/channels');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Channel $channel)
  {
    return view('channels.edit')->withChannel($channel);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Channel $channel)
  {

    $channel->title = request()->title;

    $channel->save();


    session()->flash('success', 'Channel updated successfully.');

    return redirect('/channels');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Channel $channel)
  {
    $channel->delete();

    session()->flash('success', 'Channel deleted successfully.');

    return redirect('/channels');
  }
}
