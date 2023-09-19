@extends('admin.layout')
@section('title', 'Create Location')
@section('main-content')
    <div class="container">
        <form method="POST" action="{{ route('hubs.store') }}">
            @csrf
            <label for="hubs">Choose a Hub:</label>
            <select name="hubs" id="hubs">
                @foreach ($hubs as $hub)
                    <option value="{{ $hub->name }}">{{ $hub->name }}</option>
                @endforeach
            </select>
            <br><br>
            <button type="submit" class="btn btn-primary">Next</button>
        </form>
    </div>
@endsection
