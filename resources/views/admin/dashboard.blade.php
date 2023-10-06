@extends('admin.layout')
@section('title', 'Your Home')
@section('main-content')
    <div class="container">
        <div class="container">
            @php
                $user = Auth::user();
            @endphp
            <h1>Glad to see you, {{ $user->name }}!</h1>
        </div>
    </div>
@endsection
