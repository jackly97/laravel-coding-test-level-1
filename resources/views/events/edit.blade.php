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
    Edit Event
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
    <form action="{{ route('events.update',$event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control"  value="{{ $event->name }}" name="name" required/>
        </div>
        <div class="form-group">
            <label for="startAt">Start Date</label>
            <input id="startAt" type="datetime-local" class="form-control" name="startAt" value="{{ $event->start_at ?? old('startAt') }}" required>
        </div>
        <div class="form-group">
            <label for="endAt">End Date</label>
            <input id="endAt" type="datetime-local" class="form-control" name="endAt" value="{{ $event->end_at ?? old('endAt') }}" required>
        </div>
        <button type="submit" class="btn btn-block btn-success">Update Event</button>
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
