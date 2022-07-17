@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Events</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-light" href="{{ route('logout') }}">Logout</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('events.create') }}">Create New Event</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ url('external-api') }}">Display External Api</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($events as $event)
        <tr>
            <td>{{ $event->id }}</td>
            <td>{{ $event->name }}</td>
            <td>{{ $event->start_at }}</td>
            <td>{{ $event->end_at }}</td>
            <td>
                <a href="{{ route('events.edit', $event->id)}}">
                    <button type="button" class="btn btn-success btn-sm">Edit</button>
                </a>
                <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure');" style="display: inline-block;">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-sm btn-danger" value="delete">
                </form>
                <a href="{{ route('events.show', $event->id)}}">
                    <button type="button" class="btn btn-warning btn-sm">View</button>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection


