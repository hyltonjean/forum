@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 col-md-offset-2">
      <div class="card">
        <div class="card-header">Discussions
          <a href="{{ route('discussions.create') }}" class="btn btn-success btn-sm float-right">Create
            a
            Discussion
          </a>
        </div>

        <div class="card-body">
          <table class="table table-hover">
            <thead>
              <th>
                Title
              </th>
              <th>
                Content
              </th>
              <th>
                View
              </th>
              <th>
                Edit
              </th>
              <th>
                Delete
              </th>
            </thead>
            <tbody>
              @foreach ($discussions as $discussion)
              <tr>
                <td>
                  {{ $discussion->title }}
                </td>
                <td>
                  {{  substr($discussion->content, 0, 60)." ". "..."  }}
                </td>
                <td>
                  <a href="{{ route('discussions.show', $discussion->id) }}" class="btn btn-sm btn-success">View</a>
                </td>
                <td>
                  <a href="{{ route('discussions.edit', $discussion->id) }}"
                    class="btn btn-sm btn-info text-white">Edit</a>
                </td>
                <td>
                  <form action="{{ route('discussions.destroy', $discussion->id) }}" method="POST">
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
    </div>
  </div>
</div>
@endsection