@extends('layouts.app')

@section('content')
    <br><br><br>

    <a href="{{ route('choose-location') }}" class="btn btn-primary btn-lg col-sm-10">Check Out Now</a>

    <br><br><br>
    <a  href="{{ route('reserve') }}" class="btn btn-primary btn-lg col-sm-10">Reserve for Later</a>


@endsection

@push('style')


@endpush