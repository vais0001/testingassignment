<x-app-layout>
    <?php
    $apiKey = 'cc610a4c33d0a351eaaf995a8262866f';
    $place = 'Middelburg, Netherlands';
    $url = "https://api.openweathermap.org/data/2.5/weather?q=$place&units=metric&APPID=$apiKey";
    $data = file_get_contents($url);
    $json = json_decode($data);

    $temperature = $json->main->temp;
    $description = $json->weather[0]->description;
    $imgPath='';
    switch ($description){
        case 'clear sky':
            $imgPath='images/day.svg';
            break;
        case 'few clouds':
            $imgPath='images/cloudy-day-1.svg';
            break;
        case 'scattered clouds':
            $imgPath='images/cloudy.svg';
            break;
        case 'broken clouds':
            $imgPath='images/cloudy.svg';
            break;
        case 'overcast clouds':
            $imgPath='images/cloudy.svg';
            break;
        case 'shower rain':
            $imgPath='images/rainy-3.svg';
            break;
        case 'rain':
            $imgPath='images/rainy-7.svg';
            break;
        case 'light rain':
            $imgPath='images/rainy-7.svg';
            break;
        case 'thunderstorm':
            $imgPath='images/thunder.svg';
            break;
        case 'snow':
            $imgPath='images/snowy-6.svg';
            break;
        case 'mist':
            $imgPath='images/cloudy.svg';
            break;
    }
    $iconCode = $json->weather[0]->icon;
    $iconUrl = "http://openweathermap.org/img/w/$iconCode.png";
    ?>

    <x-slot name="slot">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <style>
            /*Change nav to absolute so model does not break*/
            nav {
                position: absolute;
                width: 100%;
            }
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;600&display=swap');

            body {
                margin: 0;
                padding: 0;
                overflow: hidden;
                font-family: 'Poppins', sans-serif;
            }

            .button-container {
                position: fixed;
                left: 0;
                top: 50%;
                transform: translateY(-50%);
                display: flex;
                flex-direction: column;
            }

            .button-light {
                margin-bottom: 10px;
                border-radius: 10px;
                padding: 10px;
                background: rgba(299, 299, 299, 0.4);
                color: black;
                cursor: pointer;
            }

            .button-dark {
                margin-bottom: 10px;
                border-radius: 10px;
                padding: 10px;
                background: rgba(0, 0, 0, 0.4);
                color: white;
                cursor: pointer;
            }

            #jrczimg {
                height: 120px;
                width: 200px;
            }

            .logo {
                height: 50px;
                width: 50px;
            }

            /*Weather Widget*/
            .outside-temperature-container {
                position: absolute;
                right: 1%;
                top: 85%;
                transform: translateY(-50%);
                display: flex;
                flex-direction: column;
            }

            .widget-light {
                width: 200px;
                height: 225px;
                border-radius: 20px;
                background: rgba(299, 299, 299, 0.4);
            }

            .widget-dark {
                width: 200px;
                height: 225px;
                border-radius: 20px;
                background: rgba(0, 0, 0, 0.4);
            }

            .widget-light .left {
                position: absolute;
                right: 0;
                width: 200px;
                margin-top: 85px;
            }

            .widget-dark .left {
                position: absolute;
                right: 0;
                width: 200px;
                margin-top: 85px;
            }

            .widget-light .right {
                position: absolute;
                right: 0;
                width: 200px;
                color: black;
                margin: 20px 0;
            }

            .widget-dark .right {
                position: absolute;
                right: 0;
                width: 200px;
                color: #fff;
                margin: 20px 0;
            }

            .icon {
                width: 50%;
                margin-bottom: 0;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

            .weather-status {
                color: black;
                text-align: center;
                margin: -5px 0 0;
                font-size: 20px;
            }

            .widget-light .right .city {
                font-size: 1em;
                text-align: center;
                margin-bottom: 10px;
                text-shadow: 1px 1px 5px #707070;
            }

            .widget-dark .right .city {
                font-size: 1em;
                text-align: center;
                margin-bottom: 10px;
                text-shadow: 1px 1px 5px #707070;
            }

            .widget-light .right .degree {
                font-size: 2.5em;
                font-weight: bold;
                text-align: center;
                margin: 0;
                text-shadow: 1px 1px 5px #707070;
            }

            .widget-dark .right .degree {
                font-size: 2.5em;
                font-weight: bold;
                text-align: center;
                margin: 0;
                text-shadow: 1px 1px 5px #707070;
            }

        </style>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <div id="model" class="antialiased d-flex flex-column">
            <div class="button-container">
                <button class="button-light button" id="button-light1" value="ground">Ground Floor</button>
                <button class="button-light button" id="button-light2" value="1">Floor 1</button>
                <button class="button-light button" id="button-light3" value="2">Floor 2</button>
                <button class="button-light button" id="button-light4" value="3">Floor 3</button>
            </div>
            {{--Weather Widget--}}
            <div class="outside-temperature-container">
                <div class="widget-light">
                    <div class="left">
                        <img src="{{ asset($imgPath) }}" class="icon" alt="Weather Icon">
                        <h5 class="weather-status"><?php echo $description; ?></h5>
                    </div>
                    <div class="right">
                        <h5 class="city">Middelburg</h5>
                        <h5 class="degree"><?php echo round($temperature); ?>&deg;C</h5>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
