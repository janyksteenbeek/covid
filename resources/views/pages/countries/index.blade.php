@extends('layouts.master')
@section('title', "COVID Tracker for {$country}: daily COVID-19 statistics")
@section('content')
    <h2 class="pb-2 mb-4 border-bottom">COVID-19 data for {{ $country }}</h2>
    <country-data country-code="{{ $countryCode }}"></country-data>

    <tips></tips>
@endsection
@section('header-button')
    <subscribe country-code="{{ $countryCode }}"></subscribe>
@endsection
