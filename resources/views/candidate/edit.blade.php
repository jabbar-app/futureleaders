@extends('layouts.main')

@section('content')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
      <h5 class="card-header">Edit Kandidat</h5>
      <div class="card-body">
        @include('candidate._form', [
            'action' => route('candidate.update', $candidate->id),
            'method' => 'PUT',
            'submitLabel' => 'Update Data',
        ])
      </div>
    </div>
  </div>
@endsection
