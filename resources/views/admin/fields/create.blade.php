@extends('layouts.dashboard')

@section('content')
  <div class="bg-light p-5 rounded">
    <h1>Create form field</h1>


      <form method="post" action="{{ route('admin.fields.store') }}">
          <div class="form-group">
              @csrf
              <label for="title">Label</label>
              <input type="text" class="form-control" name="title" required/>
          </div>
          <div class="form-group">
              <label for="content">Field type</label>
              <select  class="form-select" name="type">
                <option value="text">Text Field</option>
                <option value="number">Number Field</option>
                <option value="select">Select box</option>
              </select>
          </div>
          <input type="hidden" name="userform_id" value="{{ $userform_id }}" />

          <h4>Add options here</h4>
          <ul id="options">
          </ul>

          <div class="input-group">
            <input placeholder="value"  type="text" class="js-new-item form-control">
            <span class="input-group-btn">
            <button @click="addItem" class="js-add btn btn-default btn-primary btn-sm" type="button">Add!</button>
            </span>
          </div>
          <button type="submit" class="mt-2 btn btn-block btn-danger">Create </button>
      </form>

  </div>
@endsection