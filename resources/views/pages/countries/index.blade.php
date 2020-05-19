@extends('layouts.master')
@section('content')
    <h2 class="pb-2 mb-4 border-bottom">COVID-19 data for {{ $country }}</h2>
    <country-data country-code="{{ $countryCode }}"></country-data>
    <tips></tips>
@endsection
