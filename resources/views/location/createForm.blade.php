@extends('admin.layout')
@section('title', 'Create Location')
@section('main-content')
    <div class="container">
        <form method="POST" action="{{ route('locations.create') }}">
            @csrf
            <div class="form-group">
                <label for="user_name">Owner:</label>
                <td>{{ $user->name }}</td>
            </div>

            <div class="form-group">
                <label for="hub_name">Hub:</label>
                <td>{{ $hub }}</td>
            </div>

            <div class="form-group">
                <label for="name">Location in your house</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Location of device">
            </div>

            <button type="submit" class="btn btn-primary">Next</button>
        </form>
    </div>
@endsection
