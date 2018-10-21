@extends('layouts.app')

@section('content')

    <h2>Cart: {{$scooter->slot->cart->name}}</h2>

    <h1>Slot: {{$scooter->slot->name}}</h1>

    <a href="{{route('unlock', [ $scooter->id])}}" class="btn btn-primary btn-lg col-xs-12">Unlock</a>

@endsection