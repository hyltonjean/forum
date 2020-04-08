@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create a new channel</div>

        <div class="card-body">
          <form action="{{ route('channels.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                placeholder="Enter a title">
              @error('title')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group text-center">
              <button type="submit" class="btn btn-success btn-sm">Save channel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection