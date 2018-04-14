var map;
var flightplan = [];

FlightApp = {
    init: function() {
        $('.ui.dropdown').dropdown();

        $( "#slider-range" ).slider({
            range: true,
            min: 1, // days
            max: 20, // days
            values: [1, 14],
            slide: function(event, ui) {
                $("#days").val(ui.values[0] + ui.values[1]);
            }
        });
        // Currently not working as intended.
        $("#days")
            .val($("#slider-range")
            .slider("values", 0) + " - " + $("#slider-range")
            .slider("values", 1)
        );

        $('.ui.calendar').calendar();
    },
    map: {
        initMap: function() {
            var currPos = {
                lat: 59.138762,
                lng: 9.672157
            };

            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 3.5,
                center: currPos,
                disableDefaultUI: true
            });
        },
        placeMarker: function(pos, map, icon) {
            // The iconbase to google is shit. We're not touching this, and alo no time to open Photoshop
            // var icon = (icon ? 'https://maps.google.com/mapfiles/kml/shapes/target.png' : false);

            var marker = new google.maps.Marker({
                position: pos,
                map: map
            });
        },
        createPolylines: function(coordinates) {
            var flightPath = new google.maps.Polyline({
                path: coordinates,
                geodesic: true,
                strokeColor: '#FF0000',
                strokeOpacity: 1.0,
                strokeWeight: 2
            });

            flightPath.setMap(map);
        }
    }
}

$(document).ready(function() {
    FlightApp.init();

    var $destionation_data = $("#destinations-data");
    var $where_to_data = $("#where-to-data");

    $("#where-to").on('click', function() {
        $where_to_data.animate({top: '-70px'}, 200, function() {
            $destionation_data.slideDown();
        });
    });

    $("#go-back").on('click', function() {
        $destionation_data.slideUp(function() {
            $where_to_data.slideDown();
        });
    });

    $(".cities-airports-dropdown .item").on('click', function() {
        var countryCode = $(this).data('value');
        ApiCalls.airports(countryCode, "Cities/Airports", $(this));
    });

    $(document).on('click', '#cities-airports .item', function() {
        var icao = $(this).data('icao');
        ApiCalls.airportLocation(icao);
    });

    $("#spice-me").on('click', function() {
        $(this).hide();
        $('[data-destination="in-between"]').show();
    });

    // For demo purposes
    $(document).on('click', '[data-icao="RJAA"]', function() {
        FlightApp.map.createPolylines(flightplan)
    });

    $("#get-results").on('click', function() {
        $("#destinations-data").slideUp(function() {
            /* psuedo code for flight-data
            This code would pupulate the actual flights with price and flight-dates.
            Unfortunately no time for us to properly implement this
            var data = [];
            var res;
            $.each(flights, function(flight) {
                var flightData = {
                    origin: flight.origin,
                    destination: flight.destination,
                    departure_date: flight.departure_date,
                    direct: flight.direct,
                    max_price: flight.filters.max_price
                }

                res = ApiCalls.flights(flightData);
                data.push(res);
            });
            */

            $("#results").fadeIn();

        });
    });
});