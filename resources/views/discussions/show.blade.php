@extends('layouts.app')

@section('content')
<h3 class="card-header bg-light border-dark text-center">{{ $discussion->title }}</h3>
<div class="card my-4">
  <div class="card-header">
    <img src="{{ $discussion->user->avatar }}" width="40px" height="40px" style="border-radius:50%;"
      alt="{{ $discussion->user->name }}">&nbsp;&nbsp;&nbsp;
    <span>{{ $discussion->user->name }}</span>
    <span style="font-weight:bold;">( {{ $discussion->user->points }} )</span>
    @auth
    @if ($discussion->is_being_watched_by_auth_user())
    <a href="{{ route('discussion.unwatch', $discussion->id) }}"
      class="btn btn-outline-dark bg-white text-dark btn-sm float-right">Unwatch</a>
    @else
    <a href="{{ route('discussion.watch', $discussion->id) }}"
      class="btn btn-outline-dark bg-white btn-sm text-dark float-right">Watch</a>
    @endif
    @endauth
  </div>

  <div class="card-body">
    <h4 class="text-center text-secondary">
      <b>{{ $discussion->title }}</b>
    </h4>
    <hr>
    <p class="text-center">
      {{$discussion->content }}
    </p>
  </div>
  @if($best_answer)

  <hr>
  <div class="card border-info my-4 m-5">
    <div class="card-header bg-info">
      <img src="{{ $best_answer->user->avatar }}" width="40px" height="40px" style="border-radius:50%;"
        alt="{{ $best_answer->user->name }}">
      <span class="text-white">{{ $best_answer->user->name }}</span>
      <span style="font-weight:bold; color:white;">( {{ $best_answer->user->points }} )</span>
      <h3 class="text-center text-white pb-3">BEST ANSWER</h3>
    </div>
    <div class="card-body border-info">
      {{ $best_answer->content }}
    </div>
  </div>

  @endif
  <div class="card-footer">
    <span class="badge badge-light text-dark py-2 mb-0">
      {{ $discussion->replies->count() <= 1 ? $discussion->replies->count() . " " . "Reply" : $discussion->replies->count() . " " . "Replies" }}
    </span>
    <span class="float-right"><a href="{{ route('channel', $discussion->channel->slug) }}"
        class="btn btn-outline-dark text-dark bg-white btn-sm">{{ $discussion->channel->title }}</a></span>
  </div>
</div>

<h3 class="card-header bg-light border-dark text-center">Replies</h3>
@foreach ($discussion->replies as $r)
<div class="card my-4">
  <div class="card-header">
    <img src="{{ $r->user->avatar }}" width="40px" height="40px" style="border-radius:50%;"
      alt="{{ $r->user->name }}">&nbsp;&nbsp;&nbsp;
    <span>{{ $r->user->name }}</span>
    <span style="font-weight:bold;">( {{ $r->user->points }} )</span>
    @if(!$best_answer)
    @auth
    @if(auth()->user()->id == $discussion->user->id)
    <a href="{{ route('discussion.best_answer', $r->id) }}"
      class="float-right btn btn-outline-dark bg-white text-dark btn-sm">Mark as best answer</a>
    @endif
    @endauth
    @endif
  </div>

  <div class="card-body">
    <p class="text-center">
      {{$r->content }}
    </p>
  </div>
  <div class="card-footer">

    @auth
    @if($r->is_liked_by_auth_user())
    <a href="{{ route('reply.unlike', $r->id) }}" class="btn btn-danger btn-sm">Unlike &nbsp;<span
        class="badge badge-light">{{ $r->likes->count() }}</span></a>
    @else
    <a href="{{ route('reply.like', $r->id) }}" class="btn btn-success btn-sm">Like &nbsp;<span
        class="badge badge-light">{{ $r->likes->count() }}</span></a>
    @endif
    @endauth

  </div>
</div>
@endforeach

<div class="">
  <form action="{{ route('discussion.reply', $discussion->id) }}" method="POST">
    @csrf
    <div class="card">
      <label for="reply" class="card-header w-100 border-secondary"><b>Leave a reply</b></label>
      <textarea name="reply" id="reply" cols="30" rows="10" class="card-body form-control"></textarea>
      <div class="card-footer">
        @auth
        <button type="submit" class="btn btn-success">Reply</button>
        @else
        <a href="{{ route('login') }}" type="button" class="btn btn-danger text-white">Sign in to leave a reply!</a>
        @endauth
      </div>
    </div>
  </form>
</div>
@endsection