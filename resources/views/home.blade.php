@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Forms') }}
                </div>

                <div class="card-body">

                <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>

                </tr>
                @foreach ($forms as $form)
                <tr>
                    <td>{{ $form->id }}</td>
                    <td>
                    <a href="{{ route('forms.show', $form->id) }}" role="button">{{ $form->title }}</a>
                    </td>

                </tr>
                @endforeach
                </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
