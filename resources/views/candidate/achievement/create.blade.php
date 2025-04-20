@extends('layouts.form')

@section('form')
  @include('candidate.education._form', [
      'action' => route('candidate.education.store', $candidate),
      'method' => 'POST',
      'submitLabel' => 'Simpan Data',
  ])
@endsection
