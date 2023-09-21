@extends('admin.layout')
@section('title', 'Device Management')
@section('main-content')
    <button type="button" onclick="window.location='{{ route('hubs.create') }}'" class="btn btn-success">Add</button>
    <button type="button" class="btn btn-danger">Delete</button>
    <br><br>
    <div class="title_table">
        <p>Locations</p>
    </div>
    <main role="main">
        <div class="row row-cols-2 g-3">
            @foreach ($locations as $location)
                <div class="col">
                    <div class="card">
                        <img src="https://cdn-icons-png.flaticon.com/512/6192/6192020.png" class="card-img-top"
                            alt="Hollywood Sign on The Hill" />
                        <div class="card-body">
                            <h5 class="card-title">{{ $location->name }}</h5>
                            <p class="card-text">
                            <p class="hub-quantity">Number of Hubs:</p>
                            <p class="device-quantity">HI</p>
                            </p>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </main>
@endsection
