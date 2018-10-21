@extends('layouts.app')


@section('content')

    <H1>Trip in Progress</H1>


            <h2 id="countTime"></h2>


    <form action="/return" method="post">
        {{csrf_field()}}
        <label for="pickup_station_id">Return Station</label>
        <select name="dropoff_station_id" id="dropoff_station_id">
            <option value="">Select One</option>
            @foreach($stations as $station)
                <option value="{{$station->id}}">{{$station->name}}</option>
            @endforeach
        </select>
        <div style="height: 50px"></div>

        <input type="submit" id="return-button" type="button" class="btn btn-primary btn-lg col-xs-12" value="Return Scooter">

    </form>


@endsection

@push('js')
    <script>

        var countdown = 30 * 60 * 1000;
        var timerId = setInterval(function(){
            countdown -= 1000;
            var min = Math.floor(countdown / (60 * 1000));
            //var sec = Math.floor(countdown - (min * 60 * 1000));  // wrong
            var sec = Math.floor((countdown - (min * 60 * 1000)) / 1000);  //correct

            if (countdown <= 0) {
                alert("30 min!");
                clearInterval(timerId);
                //doSomething();
            } else {
                $("#countTime").html(min + " : " + sec);
            }

        }, 1000); //1000ms. = 1sec.

    </script>
@endpush