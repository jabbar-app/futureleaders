@extends('layouts.form')

@section('form')
  @include('candidate.achievement._form', [
      'action' => route('candidate.achievement.update', $candidate),
      'method' => 'PUT',
      'submitLabel' => 'Update Data',
  ])
@endsection
