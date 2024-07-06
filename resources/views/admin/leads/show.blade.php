@extends('layouts.my-admin')

@section('content')
<div class="container mt-3">
  <h1>{{ $lead->name }} {{ $lead->lastname }}</h1>
  <div>{{ $lead->message }}</div>
</div>
@endsection