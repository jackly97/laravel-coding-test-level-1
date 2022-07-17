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
    Login
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
    @if (session('message'))
    <div class="row align-items-center">
        <div class="col-12">
            <div class="alert alert-danger">
                <strong>{{ session('message') }}</strong>
            </div>
        </div>
        </div>
    @endif
    @if (session('status'))
    <div class="row align-items-center">
        <div class="col-12">
            <div class="alert alert-info bg-success" role="alert">
                <strong>{{ session('status') }}</strong>
            </div>
        </div>
        </div>
    @endif
    <form action="{{ route('signIn') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" placeholder="email@example.com" required>
            </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input type="text" name="password" class="form-control" required>
            </div>
          <button type="submit" class="btn btn-block btn-success">Sign In</button>
    </form>
@endsection
