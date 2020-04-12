<?php

namespace App\Http\Controllers;

use App\Channel;
use Illuminate\Support\Str;
use App\Http\Requests\CreateChannelsRequest;

class ChannelsController extends Controller
{
  public function __construct()
  {
    $this->middleware(['auth', 'admin']);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('channels.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('channels.create');
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
      'title' => $request->title,
      'slug' => Str::slug($request->title)
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
  public function show()
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
    return view('channels.create')->with('channel', $channel);
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
    $channel->slug = Str::slug(request()->title);

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
