@extends('layouts.dashboard')

@section('content')
  <div class="bg-light p-5 rounded">
    <h1>Forms</h1>
    <p class="lead">Create dynamic forms.</p>
    <a class="btn btn-primary" href="{{ route('admin.forms.create') }}" role="button">Add &raquo;</a>

    <table class="table">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th></th>
      </tr>
    @foreach ($forms as $form)
      <tr>
        <td>{{ $form->id }}</td>
        <td>
          <a href="{{ route('admin.forms.show', $form->id) }}" role="button">{{ $form->title }}</a>
        </td>
        <td>
        <a class="btn btn-primary btn-sm" href="{{ route('admin.forms.edit', $form->id) }}" role="button">Edit</a>
          |
                <form action="{{ route('admin.forms.destroy', $form->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                  </form>

        </td>

      </tr>
    @endforeach
    </table>

    <h1>Form submission</h1>

    <table class="table">
      <tr>
        <th>ID</th>
        <th>Form</th>
        <th></th>
      </tr>
    @foreach ($submissions as $submission)
      <tr>
        <td>{{ $submission->id }}</td>
        <td>
          <a href="{{ route('admin.submissions.show', $submission->id) }}" role="button">{{ $submission->userform->title }}</a>
        </td>
      </tr>
    @endforeach
    </table>

  </div>
@endsection