@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Update a channel</div>

        <div class="card-body">
          <form action="{{ route('channels.update', $channel->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                value="{{ $channel->title }}" placeholder="Enter a title">
              @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group text-center">
              <button type="submit" class="btn btn-success btn-sm">Update channel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection