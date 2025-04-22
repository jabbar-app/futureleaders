@extends('layouts.form')

@section('form')
  @include('candidate.achievement._form', [
      'action' => route('candidate.achievement.store', $candidate),
      'method' => 'POST',
      'submitLabel' => 'Simpan Data',
  ])
@endsection
