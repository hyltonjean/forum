@extends('layouts.app')

@section('content')

<div class="card my-4">
  <div class="card-header">
    <img src="{{ $discussion->user->avatar }}" width="40px" height="40px" style="border-radius:50%;"
      alt="{{ $discussion->user->name }}">&nbsp;&nbsp;&nbsp;
    <span style="font-weight:bold; ">{{ $discussion->user->name }}</span>
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
  <div class="card-footer">
    <span class="badge badge-light text-warning py-2 mb-0">
      {{ $discussion->replies->count() <= 1 ? $discussion->replies->count() . " " . "Reply" : $discussion->replies->count() . " " . "Replies" }}
    </span>
    <span class="float-right"><b class="text-primary">{{ $discussion->created_at->diffForHumans() }}</b></span>
  </div>
</div>

@foreach ($discussion->replies as $r)
<div class="card my-4">
  <div class="card-header">
    <img src="{{ $r->user->avatar }}" width="40px" height="40px" style="border-radius:50%;"
      alt="{{ $r->user->name }}">&nbsp;&nbsp;&nbsp;
    <span style="font-weight:bold; ">{{ $r->user->name }}</span>
    <span class="float-right text-warning" style="font-weight:bold; ">Reply</span>
  </div>

  <div class="card-body">
    <p class="text-center">
      {{$r->content }}
    </p>
  </div>
  <div class="card-footer">
    <b class="text-primary float-right">{{ $r->created_at->diffForHumans() }}</b>

    @if($r->is_liked_by_auth_user())
    <a href="#" class="btn btn-danger btn-sm">Unlike</a>
    @else
    <a href="#" class="btn btn-success btn-sm">Like</a>
    @endif

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
        <button type="submit" class="btn btn-success">Reply</button>
      </div>
    </div>
  </form>
</div>
@endsection