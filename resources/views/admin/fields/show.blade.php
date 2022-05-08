@extends('layouts.dashboard')

@section('content')
  <div class="bg-light p-5 rounded">
    <h1>{{ $form->title }}</h1>
    <p class="lead">{{ $form->content }}</p>


  </div>
@endsection