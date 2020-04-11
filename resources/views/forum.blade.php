@extends('layouts.app')

@section('content')
<h3 class="card-header bg-light border-dark text-center">Discussions</h3>
@foreach ($discussions as $d)
<div class="card my-4">
  <div class="card-header">
    <img src="{{ $d->user->avatar }}" width="40px" height="40px" style="border-radius:50%;"
      alt="{{ $d->user->name }}">&nbsp;&nbsp;&nbsp;
    <span>{{ $d->user->name }}</span>
    <span style="font-weight:bold;">( {{ $d->user->points }} )</span>

    <a href="{{ route('discussions.show', $d->slug) }}"
      class="btn btn-outline-dark bg-white text-dark mt-2 float-right">View</a>
  </div>

  <div class="card-body">
    <h4 class="text-center text-secondary">
      <b>{{ $d->title }}</b>
    </h4>
    <p class="text-center mt-3">
      {{  substr($d->content, 0, 50)  }}
    </p>
  </div>
  <div class="card-footer">
    <span class="badge badge-light text-dark py-2 mb-0">
      {{ $d->replies->count() <= 1 ? $d->replies->count() . " " . "Reply" : $d->replies->count() . " " . "Replies" }}
    </span>

    <span class="float-right"><a href="{{ route('channel', $d->channel->slug) }}"
        class="btn btn-outline-dark text-dark bg-white btn-sm">{{ $d->channel->title }}</a></span>
  </div>
</div>
@endforeach

<div class="d-flex justify-content-center">
  {{ $discussions->links() }}
</div>
@endsection