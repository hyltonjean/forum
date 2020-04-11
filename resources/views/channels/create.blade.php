@extends('layouts.app')

@section('content')
<div class="card">

  <div class="card-header">{{ isset($channel) ? "Update a channel" : "Create a new channel" }}</div>
  <div class="card-body">
    <form action="{{ isset($channel) ? route('channels.update', $channel->slug) : route('channels.store') }}"
      method="POST">
      @csrf
      @if(isset($channel))
      @method('PUT')
      @endif
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
          placeholder="Enter a title" value="{{ isset($channel) ? $channel->title : "" }}">
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group text-center">
        <button type="submit"
          class="btn btn-success btn-sm">{{ isset($channel) ? "Update channel" : "Create channel" }}</button>
      </div>
    </form>
  </div>
</div>
@endsection