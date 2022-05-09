@extends('layouts.dashboard')

@section('content')
  <div class="bg-light p-5 rounded">
    <h1>Form submission - {{ $submission->userform->title }}</h1>

    <table class="table">
      <tr>
        <th>Name</th>
        <th>value</th>
        <th></th>
      </tr>
    @foreach ($submission->fields as $field)
      <tr>
        <td>{{ $field->name }}</td>
        <td>{{ $field->value }}</td>
      </tr>
    @endforeach
    </table>

  </div>
@endsection