@extends('layouts.app')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  <table class="table">
    <thead>
        <tr class="table-success">
          <td>ID</td>
          <td>Name</td>
          <th>Slug</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $event->id }}</td>
            <td>{{ $event->name }}</td>
            <td>{{ $event->slug }}</td>
            <td>{{ $event->start_at }}</td>
            <td>{{ $event->end_at }}</td>
            <td><a class="btn btn-block btn-primary" href="{{ route('events.index') }}"> Back</a><td>
        </tr>
    </tbody>
  </table>
<div>
@endsection
