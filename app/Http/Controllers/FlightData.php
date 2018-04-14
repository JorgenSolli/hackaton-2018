<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlightData extends Controller
{
    // Generalized the CURL method, as we extect to make more of them with the same data-structure
    public static function curl($inputs) {
        $API_TOKEN = env('AMADEUS_API_TOKEN');
        $ch = curl_init();

        $opts = "";
        foreach ($inputs as $opt => $val) {
            $opts .= "&" . $opt . "=" . $val;
        }

        curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.amadeus.com/v1.2/flights/extensive-search?apikey=$API_TOKEN$opts");

        $headers = array();
        $headers[] = "Content-Type: application/json";

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_exec($ch);
        $result = curl_exec($ch);
        curl_close ($ch);

        return $result;
    }

    /**
     * Posts API call for a flight-search
     *
     * @return
     */
    public function searchFlight(Request $request)
    {
        $inputs = [
            'origin' => $request->origin,
            'destination' => $request->destination,
            'departure_date' => $request->departure_date,
            'one-way' => $request->direct,
            'direct' => 'true',
            'max_price' => $request->max_price
        ];

        echo $this->curl($inputs);
    }
}
