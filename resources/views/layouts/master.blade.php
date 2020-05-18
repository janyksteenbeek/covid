<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COVID Tracker</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script>
        window._init = @json(['countries' => \App\Constants\Countries::all()]);
    </script>
</head>
<body>
    <div class="container" id="app">
        @include('layouts.partials.header')

        <div class="card">
            <div class="card-body">
                @yield('content')
            </div>
        </div>


        <hr>
        <div class="text-muted">Built with <3 by <a href="https://www.janyksteenbeek.nl/?ref=covid-tracker" target="_blank"">Janyk Steenbeek</a>. Data by The Virus Tracker, hosted by
            <a href="https://www.janyksteenbeek.nl/digitalocean">DigitalOcean</a></div>

    </div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
