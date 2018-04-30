<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url('http://www.calgary.ca/CA/city-manager/scripts/about-us/webparts/images/ourHistory_retina.jpg');
                background-attachment: fixed;
                background-blend-mode: color-burn;
                background-size: cover; 
                color: white;
                font-family: 'Raleway', sans-serif;
                font-weight: 800;
                font-size: 28px;
                height: 100vh;
                margin: 0;
            }

            .link{
                text-decoration: none;
                color: snow;
            }

            .zdjecie{
                background-image: "C:/Users/Grześ/Desktop/zdjecia";
                background-repeat: no-repeat;
                background-size: cover;
                width: 200px;
                height: 200px;
            }

            .inside{
                border: solid;
                border-width: 3px;
                border-color: white;
                padding: 20px;
                background: radial-gradient(darkviolet, purple, darkmagenta);
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #map{
                width: 100%;
                height: 400px;
            }
        </style>
    </head>
    <body>
            <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                </div>
                <div class="zdjecie"><?php
                      echo $tablica['_embedded']["city:search-results"][0]['matching_alternate_names'][0]['name'];
                      ?></div>
                <div class="inside">
                   <?php
                  /*   dd($tablica); */
                    echo $tablica['_embedded']["city:search-results"][0]['matching_alternate_names'][0]['name'];
                    echo '<br />';
                    echo '<br />';
                    echo $tablica['_embedded']["city:search-results"][0]['matching_full_name'];
                    echo '<br />';
                    echo 'Populacja: ',$tablica['population'];
                    echo '<br />';
                    echo '<br />';
                    echo 'Współrzędne geograficzne: ';
                    echo '<br />';
                    echo 'Szerokość geograficzna: ',$tablica["location"]["latlon"]["latitude"];
                    $szerokosc = $tablica["location"]["latlon"]["latitude"];
                    echo '<br />';
                    echo 'Długość geograficzna: ',$tablica["location"]["latlon"]["longitude"];    
                    $dlugosc = $tablica["location"]["latlon"]["longitude"];
                    echo '<br />';
                    echo '<br />';
                    $link = "https://www.gps-coordinates.net/latitude-longitude/$szerokosc/$dlugosc/10/roadmap";
                    echo '<a class="link" href="',$link,'" target="blank">',"Link do mapy",'</a>';
                    ?>
                     
            </div>
                     <div id="map"></div>
                     <script>
                       function initMap() {
                         var uluru = {lat: <?php echo $szerokosc ?>, lng: <?php echo $dlugosc ?>};
                         var map = new google.maps.Map(document.getElementById('map'), {
                           zoom: 4,
                           center: uluru
                         });
                         var marker = new google.maps.Marker({
                           position: uluru,
                           map: map
                         });
                       }
                     </script>
                     <script async defer
                     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPeBpxkaqJlIXhGBgIhTHMvIg9Lr5Cs1U&callback=initMap">
                     </script>
        </div>
    </body>
</html>