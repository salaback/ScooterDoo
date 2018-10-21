@extends('layouts.app')

@section('content')

    <div class="col-xs-offset-1 col-xs-10">
        <form action="{{route('checkout')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="scooter_id" id="scooter_id" value="">
            <div style="height: 100px"></div>
            <label for="pickup_station_id">Pick Up Station</label>
            <select name="pickup_station_id" id="pickup_station_id">
                <option value="">Select One</option>
                @foreach($stations as $station)
                    <option value="{{$station->id}}">{{$station->name}}</option>
                @endforeach
            </select>

            <div style="height: 50px"></div>

            <input type="submit" id="reserve-button" type="button" class="btn btn-disabled btn-lg col-xs-12" value="Reserve Scooter">
        </form>
    </div>


@endsection


@push('js')

    <script>
        $('#pickup_station_id').on('change', function(){
            $.ajax({
                url: '/station/find-scooter/' + $('#pickup_station_id').val(),
                type: 'GET',
                success: function(data) {
                    if (data != null) {
                        $('#reserve-button').addClass('btn-primary').removeClass('btn-disabled');
                        $('#scooter_id').val(data);
                    }
                    else {
                        $('#reserve-button').addClass('btn-disabled').removeClass('btn-primary');
                    }
                }})});
    </script>

    @endpush