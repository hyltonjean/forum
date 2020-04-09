@extends('layouts.app')

@section('content')
<div class="card">
  <h5 class="card-header text-center">{{ isset($discussion) ? "Update a discussion" : "Create a new discussion" }}</h5>

  <div class="card-body">
    <form action="{{ isset($discussion) ? route('discussions.update', $discussion->id) : route('discussions.store') }}"
      method="POST">
      @csrf

      @if(isset($discussion))
      @method('PUT')
      @endif

      <div class="form-group">
        <label for="title" style="font-weight: bold;">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
          placeholder="Enter a title" value="{{ isset($discussion) ? $discussion->title : "" }}">
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="channel_id" style="font-weight: bold;">Pick a channel</label>
        <br />
        <select name="channel_id" id="channel_id" class="form-control @error('channel_id') is-invalid @enderror">

          @if(isset($discussion))
          <option value="{{ $discussion->channel_id }}">
            {{ $discussion->channel->title }}
          </option>
          @else
          @foreach ($channels as $channel)
          <option value="{{ $channel->id }}">
            {{ $channel->title }}
          </option>
          @endforeach
          @endif

        </select>
        @error('channel_id')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="content" style="font-weight: bold;">Ask a question</label>
        <textarea name="content" id="content" cols="6" rows="6"
          class="form-control @error('content') is-invalid @enderror"
          placeholder="Ask your question.">{{ isset($discussion) ? $discussion->content : "" }}</textarea>
        @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>


      <div class="form-group text-right">
        <button type="submit"
          class="btn btn-success">{{ isset($discussion) ? "Update discussion" : "Create discussion" }}</button>
      </div>
    </form>
  </div>
</div>
@endsection