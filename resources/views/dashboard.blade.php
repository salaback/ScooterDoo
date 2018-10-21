@extends('layouts.app')

@section('content')

    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Scooters Inventory</h3> </div>
            <div class="panel-body">
                <div class="list-group">
                    @foreach($stations as $station)
                    <div class="list-item">
                        <b>{{$station->name}}</b> {{$station->availableScooters->count()}} scooters
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-heading"><h3>Free Slots</h3> </div>
            <div class="panel-body">
                <div class="list-group">
                    @foreach($stations as $station)
                        <div class="list-item">
                            <b>{{$station->name}}</b> {{$station->availableSlots->count()}} free slots
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>


@endsection