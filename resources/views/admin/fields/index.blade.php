@extends('layouts.dashboard')

@section('content')
  <div class="bg-light p-5 rounded">
    <h1>fields</h1>
    <p class="lead">Create dynamic fields.</p>
    <a class="btn btn-primary" href="{{ route('admin.fields.create') }}" role="button">Add &raquo;</a>
    <table class="table">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th></th>
      </tr>
    @foreach ($fields as $field)
      <tr>
        <td>{{ $field->id }}</td>
        <td>{{ $field->title }}</td>
        <td>
          <a class="btn btn-primary btn-sm" href="{{ route('admin.fields.edit', $field->id) }}" role="button">Edit</a>
          |
                <field action="{{ route('admin.fields.destroy', $field->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                  </field>
         </td>
      </tr>
    @endforeach
    </table>
  </div>
@endsection