@extends('layouts.form')

@section('form')
  @include('candidate.motivation._form', [
      'action' => route('candidate.motivation.store', $candidate),
      'method' => 'POST',
      'submitLabel' => 'Simpan Data',
  ])
@endsection
