@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create a new discussion</div>

        <div class="card-body">
          <form action="{{ route('discussions.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                placeholder="Enter a title">
              @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="content">Content</label>
              <textarea name="content" id="content" cols="6" rows="6"
                class="form-control @error('content') is-invalid @enderror"></textarea>
              @error('content')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="channel_id">Channel</label>
              <select name="channel_id" id="channel_id" class="@error('channel_id') is-invalid @enderror">
                @foreach ($channels as $channel)
                <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                @endforeach
              </select>
              @error('channel_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group text-center">
              <button type="submit" class="btn btn-success btn-sm">Save discussion</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection