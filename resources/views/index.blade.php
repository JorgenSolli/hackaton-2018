@extends('layouts.app')

@section('content')

<div id="where-to-data" class="inputs with-overlay">
    <div class="ui grid">
        <div class="sixteen wide column">
            <div class="ui icon input w-100">
                <input type="text" id="where-to" placeholder="Where to!">
                <i class="map pin icon"></i>
            </div>
        </div>
    </div>
</div>

<div id="destinations-data" class="inputs" style="display: none;">
    <div class="ui grid">
        <div class="two wide column center aligned" id="go-back">
            <i class="angle left icon"></i>
        </div>
        <div class="seven wide column">
            <div class="ui form">
                <div class="inline fields">
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" checked="checked" class="hidden">
                            <label>One way</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="seven wide column">
            <div class="ui form">
                <div class="inline fields">
                    <div class="field">
                        <div class="ui radio checkbox">
                            <input type="radio" class="hidden">
                            <label>Return</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui grid" data-destination="start">
        <div class="two wide column center aligned">
            <i class="home icon side-icon"></i>
        </div>
        <div class="seven wide column">
            @include('parts.countriesAndContinents')
        </div>
        <div class="country-airports seven wide column">
            <div class="ui form">
                <div class="field">
                    <input type="text" placeholder="City">
                </div>
            </div>
        </div>
    </div>

    <div class="ui grid" id="spice-me">
        <div class="two wide column center aligned">
            <i class="plus square outline icon side-icon"></i>
        </div>
        <div class="fourteen wide column">
            <button class="w-100 ui positive right labeled icon button">
                <i class="chilli-icon" style="background: url('images/spicytrips.svg')"></i>
                Spice up my journey
            </button>
        </div>
    </div>

    <div class="ui grid" data-destination="in-between" style="display: none">
        <div class="two wide column center aligned">
            <i class="plus square outline icon side-icon"></i>
        </div>
        <div class="seven wide column">
            @include('parts.countriesAndContinents')
        </div>
        <div class="country-airports seven wide column">
            <div class="ui form">
                <div class="disabled field">
                    <input type="text" placeholder="City">
                </div>
            </div>
        </div>
    </div>

    <div class="ui grid" data-destination="end">
        <div class="two wide column center aligned">
            <i class="stop icon side-icon"></i>
        </div>
        <div class="seven wide column">
            @include('parts.countriesAndContinents')
        </div>
        <div class="country-airports seven wide column">
            <div class="ui form">
                <div class="disabled field">
                    <input type="text" placeholder="City">
                </div>
            </div>
        </div>
    </div>

    <div class="ui grid">
        <div class="two wide column center aligned">
        </div>
        <div class="fourteen wide column">
            <p>
                <label for="days">Min/max layover days</label>
                <input type="text" id="days" readonly style="border:0; color:#f6931f; font-weight:bold;">
            </p>
            <div id="slider-range"></div>
        </div>
    </div>
    <div class="ui grid">
        <div class="two wide column center aligned">
            <i class="calendar alternate outline icon side-icon"></i>
        </div>
        <div class="seven wide column" data-date="departure">
            <div class="ui form">
                <div class="ui calendar">
                    <div class="ui input left icon w-100">
                        <i class="calendar icon"></i>
                        <input type="text" placeholder="Departure">
                    </div>
                </div>
            </div>
        </div>
        <div class="seven wide column" data-date="arrival">
            <div class="ui form">
                <div class="ui calendar">
                    <div class="ui input left icon w-100">
                        <i class="calendar icon"></i>
                        <input type="text" placeholder="Arrival">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui grid">
        <div class="two wide column center aligned">

        </div>
        <div class="seven wide column" data-suggestion="1">
            <div class="ui form">
                <div class="field">
                </div>
            </div>
        </div>
        <div class="seven wide column" data-suggestion="2">
            <div class="ui form">
                <div class="field">
                </div>
            </div>
        </div>
    </div>
    <div class="ui grid">
        <div class="sixteen wide column" data-suggestion="1">
            <button id="get-results" class="w-100 ui positive right labeled icon button">
                <i class="telegram plane icon"></i>
                Plan my trip
            </button>
        </div>
    </div>
</div>

<div id="results" style="display: none">
    <div class="ui grid">
        <div class="two wide column center aligned" id="go-back">
            <i class="angle left icon"></i>
        </div>
        <div class="fourteen wide column">
            <h4>Norway, Gardermoen to Japan, Narita</h4>
        </div>
    </div>
    <div class="ui grid">
        <div class="sixteen wide column">
            <h4>Departure between</h4>
            <div class="ui grid">
                <div class="seven wide column" data-date="departure[0]">
                    <div class="ui form">
                        <div class="ui calendar">
                            <div class="ui input left icon w-100">
                                <i class="calendar icon"></i>
                                <input type="text" placeholder="Departure">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="two wide column center aligned">
                    and
                </div>
                <div class="seven wide column" data-date="departure[1]">
                    <div class="ui form">
                        <div class="ui calendar">
                            <div class="ui input left icon w-100">
                                <i class="calendar icon"></i>
                                <input type="text" placeholder="Departure">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui grid">
        <div class="sixteen wide column">
            <h4>Arrival between</h4>
            <div class="ui grid">
                <div class="seven wide column" data-date="departure">
                    <div class="ui form">
                        <div class="ui calendar">
                            <div class="ui input left icon w-100">
                                <i class="calendar icon"></i>
                                <input type="text" placeholder="Departure">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="two wide column center aligned">
                    and
                </div>
                <div class="seven wide column" data-date="arrival">
                    <div class="ui form">
                        <div class="ui calendar">
                            <div class="ui input left icon w-100">
                                <i class="calendar icon"></i>
                                <input type="text" placeholder="Arrival">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ui grid">
        <div class="sixteen wide column">
            <button class="ui button">
                Change layovers
            </button>

            <div class="ui floating labeled icon dropdown button">
                <i class="filter icon"></i>
                <span class="text">Filter by</span>
                <div class="menu">
                    <div class="item">
                        <i class="angle up icon"></i>
                        Price asc
                    </div>
                    <div class="item">
                        <i class="angle down icon"></i>
                        Price desc
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ui grid">
        <div class="sixteen wide column">
            <div class="ui card w-100">
                <div class="content">
                    <img class="right floated mini ui image" src="images/sas.png">
                    <img class="right floated mini ui image" src="images/norwegian.png">
                    <div class="header">
                        SAS and Norwegian
                    </div>
                    <div class="description">
                        <p>OSL to HKT</p>
                        <p>Departuredate Mo 16:45 - Tu 21:35</p>
                        <div class="ui label">
                            <i class="clock icon"></i> 9hr 50min
                        </div>
                    </div>
                </div>
                <div class="content">
                    <h4>Layover in Thailand</h4>
                    <div class="ui label">
                        <i class="clock icon"></i> 5 days
                    </div>
                    <p>No visa required</p>
                    <p><a>Recommended vaccines</a></p>
                </div>
                <div class="content">
                    <p>HKT to NRT</p>
                    <p>Departuredate Su 13:10 - Su 15:44</p>
                    <div class="ui label">
                        <i class="clock icon"></i> 2hr 34min
                    </div>
                </div>
                <div class="extra content">
                    <a>+ show details</a>
                </div>
                <div class="extra content">
                    <div class="ui labeled button" tabindex="0">
                        <div class="ui green button">
                            <i class="shop icon"></i> Book now
                        </div>
                        <a class="ui basic green left pointing label">
                            €1,048
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="map"></div>

<div id="parts" style="display: none">
    @include('parts.emptyDropdown')
</div>

@endsection