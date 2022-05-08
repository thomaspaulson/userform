@extends('layouts.dashboard')

@section('content')
  <div class="bg-light p-5 rounded">
    <h1>Edit form field</h1>


      <form method="post" action="{{ route('admin.fields.update', $field->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="title">Name</label>
              <input type="text" class="form-control" name="title"  value="{{ $field->title }}" required/>
          </div>
          <div class="form-group">
              <label for="content">Field type</label>
              <select  class="form-select" name="type">
                <option value="text" @if ($field->type === 'text') selected="selected" @endif>Text Field</option>
                <option value="number" @if ($field->type === 'number') selected="selected" @endif>Number Field</option>
                <option value="select" @if ($field->type === 'select') selected="selected" @endif>Select box</option>
              </select>
          </div>
          <input type="hidden" name="userform_id" value="{{ $field->userform_id }}" />

          <h4>Add options here</h4>
          <ul id="options">
          @if ($field->type === 'select')
            @foreach ($field->options as $option)
            <li>
              <div>
                <label><input type="hidden" value="{{ $option->value }}" name="option[]">{{ $option->value }}</label>
                <button type="button" class="js-item">del</button>
              </div>
            </li>
            @endforeach
          @endif
          </ul>

          <div class="input-group">
            <input placeholder="value"  type="text" class="js-new-item form-control">
            <span class="input-group-btn">
            <button @click="addItem" class="js-add btn btn-default" type="button">Add!</button>
            </span>
          </div>
          <button type="submit" class="mt-2 btn btn-block btn-danger">Edit </button>
      </form>

  </div>
@endsection