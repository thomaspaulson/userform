@extends('layouts.dashboard')

@section('content')
  <div class="bg-light p-5 rounded">
    <h1>Edit form</h1>
    <p class="lead">Dynamic forms.</p>

      <form method="post" action="{{ route('admin.forms.update', $form->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="title">Name</label>
              <input type="text" class="form-control" name="title"  value="{{ $form->title }}" required/>
          </div>
          <div class="form-group">
              <label for="content">Description</label>
              <input type="content" class="form-control" name="content"   value="{{ $form->content }}" required/>
          </div>
          <button type="submit" class="mt-2 btn btn-block btn-danger">Edit </button>
      </form>

  </div>
@endsection