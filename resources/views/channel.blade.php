@extends('layouts.app')

@section('content')
@foreach ($discussions as $d)
<div class="card my-4">
  <div class="card-header">
    <img src="{{ $d->user->avatar }}" width="40px" height="40px" style="border-radius:50%;"
      alt="{{ $d->user->name }}">&nbsp;&nbsp;&nbsp;
    <span>{{ $d->user->name }}</span>
    <span style="font-weight:bold;">( {{ $d->user->points }} )</span>
    <a href="{{ route('discussions.show', $d->slug) }}"
      class="btn btn-outline-dark bg-white text-dark btn-sm ml-3 float-right">View</a>
    @if ($d->hasBestAnswer())
    <a href="#" class="btn btn-outline-dark text-dark bg-white btn-sm float-right">Closed</a>
    @else
    <a href="#" class="btn btn-outline-dark text-dark bg-white btn-sm float-right">Open</a>
    @endif
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
    <div class="row">
      <div class="col-md-6 d-flex justify-content-start">
        <span class="badge badge-light text-dark py-2 mb-0">
          {{ $d->replies->count() <= 1 ? $d->replies->count() . " " . "Reply" : $d->replies->count() . " " . "Replies" }}</span>
      </div>
      <div class="col-md-6 d-flex justify-content-end">
        <span><b>{{ $d->created_at->diffForHumans() }}</b></span>
      </div>
    </div>
  </div>
</div>
@endforeach

<div class="d-flex justify-content-center">
  {{ $discussions->links() }}
</div>
@endsection