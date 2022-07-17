@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>External Api</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-light" href="{{ route('events.index') }}">Back To Event</a>
        </div>
    </div>
</div>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    @foreach ($responses as $response)
    <tr>
        <td>{{ $response['API'] }}</td>
        <td>{{ $response['Description'] }}</td>
    </tr>
    @endforeach
</table>
@endsection
