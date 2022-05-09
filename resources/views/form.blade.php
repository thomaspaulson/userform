@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session('submitted'))
            <div class="alert alert-success">
                {{ session('submitted') }}
            </div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h4>{{ $form->title }}</h4>
                    {{ $form->content }}
                </div>

                <div class="card-body">


                <form method="post" action="{{ route('forms.store') }}">
                @csrf
                @foreach ($form->fields as $field)
                    @include('fields.' . $field->type)
                @endforeach

                <input type="hidden" name="userform_id" value="{{ $form->id }}"/>
                <button type="submit" class="mt-2 btn btn-block btn-danger">Submit </button>
                </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
