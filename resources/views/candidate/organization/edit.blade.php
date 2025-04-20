@extends('layouts.form')

@section('form')
  @include('candidate.organization._form', [
      'action' => route('candidate.organization.update', $candidate),
      'method' => 'PUT',
      'submitLabel' => 'Update Data',
  ])
@endsection
