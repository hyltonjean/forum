@extends('layouts.app')

@section('content')
@foreach ($discussions as $d)
<div class="card my-4">
  <div class="card-header">
    <img src="{{ $d->user->avatar }}" width="40px" height="40px" style="border-radius:50%;"
      alt="{{ $d->user->name }}">&nbsp;&nbsp;&nbsp;
    <span style="font-weight:bold; ">{{ $d->user->name }}</span>
    <a href="{{ route('discussions.show', $d->slug) }}" class="btn btn-info text-white btn-sm mt-2 float-right">View</a>
  </div>

  <div class="card-body">
    <h4 class="text-center">
      {{ $d->title }}
    </h4>
    <p class="text-center">
      {{  substr($d->content, 0, 50)  }}
    </p>
  </div>
  <div class="card-footer">
    <a href="#" class="badge badge-success py-2 mb-0">
      {{ $d->replies->count() <= 1 ? $d->replies->count() . " " . "Reply" : $d->replies->count() . " " . "Replies" }}
    </a>
  </div>
</div>
@endforeach

<div class="d-flex justify-content-center">
  {{ $discussions->links() }}
</div>
@endsection