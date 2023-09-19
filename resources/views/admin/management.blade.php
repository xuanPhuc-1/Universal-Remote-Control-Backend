@extends('admin.layout')
@section('title', 'Device Management')
@section('main-content')
    <button type="button" onclick="window.location='{{ route('hubs.create') }}'" class="btn btn-success">Add</button>
    <button type="button" class="btn btn-danger">Delete</button>

@endsection
