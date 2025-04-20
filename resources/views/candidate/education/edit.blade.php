@extends('layouts.form')

@section('form')
  @include('candidate.education._form', [
      'action' => route('candidate.education.update', $candidate),
      'method' => 'PUT',
      'submitLabel' => 'Update Data',
  ])
@endsection
