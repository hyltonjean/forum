@extends('layouts.app')

@section('content')
<div class="card">
  <h5 class="card-header text-center">Edit reply</h5>

  <div class="card-body">
    <form action="{{ route('reply.update', $reply->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="content" style="font-weight: bold;">Edit reply</label>
        <textarea name="content" id="content" cols="6" rows="6"
          class="form-control @error('content') is-invalid @enderror">{{ Markdown::convertToHtml($reply->content) }}</textarea>
        @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group text-right">
        <button type="submit" class="btn btn-outline-dark bg-white text-dark">Update reply</button>
      </div>
    </form>
  </div>
</div>
@endsection