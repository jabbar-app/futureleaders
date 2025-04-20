@extends('layouts.form')

@section('form')
  @include('candidate.organization._form', [
      'action' => route('candidate.organization.store', $candidate),
      'method' => 'POST',
      'submitLabel' => 'Simpan Data',
  ])
@endsection
