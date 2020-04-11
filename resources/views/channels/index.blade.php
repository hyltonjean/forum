@extends('layouts.app')

@section('content')
<h3 class="card-header bg-light border-dark text-center mb-4">Channels</h3>
<div class="card">
  <div class="card-header">Channels <a href="{{ route('channels.create') }}"
      class="btn btn-success btn-sm float-right">Create
      a
      Channel</a></div>

  <div class="card-body">
    <table class="table table-hover">
      <thead>
        <th>
          Name
        </th>
        <th>
          Edit
        </th>
        <th>
          Delete
        </th>
      </thead>
      <tbody>
        @foreach ($channels as $channel)
        <tr>
          <td>
            {{ $channel->title }}
          </td>
          <td>
            <a href="{{ route('channels.edit', $channel->slug) }}" class="btn btn-sm btn-info text-white">Edit</a>
          </td>
          <td>
            <form action="{{ route('channels.destroy', $channel->slug) }}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger" type="submit">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection