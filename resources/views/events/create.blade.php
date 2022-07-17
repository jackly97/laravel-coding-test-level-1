@extends('layouts.app')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Add Event
  </div>
  <div class="card-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('events.store') }}" method="POST">
          <div class="form-group">
              @csrf
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" required/>
          </div>
          <div class="form-group">
              <label for="startAt">Start Date</label>
              <input type="datetime-local" name="startAt" class="form-control" required>
            </div>
          <div class="form-group">
              <label for="endAt">End Date</label>
              <input type="datetime-local" name="endAt" class="form-control" required>
            </div>
          <button type="submit" class="btn btn-block btn-success">Create Event</button>
          <a class="btn btn-block btn-primary" href="{{ route('events.index') }}"> Back</a>
        </form>
  </div>
</div>


<script>
    $(function () {
        $('.datetimepicker').datetimepicker();
    });
</script>

@endsection
