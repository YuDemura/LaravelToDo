@extends('layout.layout')

@include('layout.tab-header')

@section('content')

  <ul class="list-group">
      @foreach ($tasks as $task)
      <li class="list-group-item d-flex justify-content-between align-items-center">
          {{ $task->status }}-{{ $task->title }}-{{ $task->status_name }}
      </li>
      @endforeach
  </ul>

@endsection
