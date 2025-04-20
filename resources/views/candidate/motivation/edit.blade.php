@extends('layouts.form')

@section('form')
  @include('candidate.motivation._form', [
      'action' => route('candidate.motivation.update', $candidate),
      'method' => 'PUT',
      'submitLabel' => 'Update Data',
  ])
@endsection
