<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('parts.head')
<body>
    <div id="app">
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="{{ mix('/js/app.min.js') }}"></script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API') }}&callback=FlightApp.map.initMap">
    </script>
</body>
</html>