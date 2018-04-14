var API_KEY = "04847030-3fbc-11e8-881b-7d08a7799b27";

ApiCalls = {
    airports: function(country, header, $obj) {
        $.ajax({
            url: 'https://v4p4sz5ijk.execute-api.us-east-1.amazonaws.com/anbdata/airports/safety/pbn-stats',
            data: {
                api_key: API_KEY,
                format: 'json',
                states: country
            },
            ataType: 'jsonp',
            success: function(res) {
                // Parses the JSON, because the API doesnt do this for us ¯\_(ツ)_/¯
                var airports = JSON.parse(res);

                var $html = $("#empty-dropdown").clone();
                $html.attr('id', 'cities-airports')
                $html.find('.default.text').text(header);

                // Manually appends the static select
                // Static data-icao for demo purposes
                $html.find('.menu').append('<div class="item" data-icao="VTSP"><i class="paper plane outline icon"></i>Surprise me!</div>');
                $html.find('.menu').append('<div class="divider"></div>');

                // Loops through results and appends to the list
                $.each(airports, function(key, airport) {
                    $html.find('.menu').append('<div class="item" data-icao="' + airport.airportCode + '"><i class="paper plane outline icon"></i>' + airport.airportName + '</div>');
                });

                // Appends all data and initis dropdown
                $obj.closest('.ui.grid').find('.country-airports').html($html);
                FlightApp.init();
            }
        });
    },
    airportLocation: function(icao) {
        $.ajax({
            url: 'https://v4p4sz5ijk.execute-api.us-east-1.amazonaws.com/anbdata/airports/locations/doc7910',
            data: {
                api_key: API_KEY,
                airports: icao,
                format: 'json',
            },
            dataType: 'jsonp',
            success: function(airport) {
                var pos = {
                    lat: airport[0].Latitude,
                    lng: airport[0].Longitude
                }

                // Places the marker for selected airport
                FlightApp.map.placeMarker(pos, map);

                // This requires us to select the POIs in the correct order. Dont hate on us.
                flightplan.push(pos);

                // For demo purposes. Creates the line when the plan is set
                if (icao === "RJAA") {
                    FlightApp.map.createPolylines(flightplan)
                }
            }
        });
    },
    // Not implemented yet
    flights: function(data) {
        $.ajax({
            url: '/api/search-flight',
            data: data,
            success: function(res) {
                console.log(res);
            }
        });
    }
}