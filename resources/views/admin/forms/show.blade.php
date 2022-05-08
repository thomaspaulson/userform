@extends('layouts.dashboard')

@section('content')
  <div class="bg-light p-5 rounded">
    <h1>{{ $form->title }}</h1>
    <p class="lead">{{ $form->content }}</p>

    <a class="btn btn-primary" href="{{ route('admin.fields.create', ['userform_id' => $form->id ]) }}" role="button">Add field&raquo;</a>
    <table class="table">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th></th>
      </tr>
    @foreach ($fields as $field)
      <tr>
        <td>{{ $field->id }}</td>
        <td>{{ $field->title }}</td>
        <td>{{ $field->type }}</td>
        <td>
          <a class="btn btn-primary btn-sm" href="{{ route('admin.fields.edit', ['field' => $field->id, 'userform_id' => $form->id]) }}" role="button">Edit</a>
          |
                <form action="{{ route('admin.fields.destroy', $field->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="userform_id" value="{{ $form->id }}" />
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                  </form>
         </td>
      </tr>
    @endforeach
    </table>

  </div>
@endsection