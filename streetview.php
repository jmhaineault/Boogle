
<!DOCTYPE html>
<html class="noIE" lang="en-US">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no"/>
        <title>Boogle</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/css/owl.theme.css">
        <link rel="stylesheet" href="assets/css/flexslider.css" type="text/css">
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/login.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">  
         <style>
          html, body {
            height: 100%;
            margin: 0;
            padding: 0;
          }
          #map, #pano {
            float: left;
            height: 100%;
            width: 45%;
          }
        </style>
    </head>
    <body>
        <div id="map"></div>
        <div id="pano"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        
        <script type="text/javascript" src="gmaps.js"></script>
        <script type="text/javascript">
            var initialize;
            initialize = function() {
            var map;
            var latlng = {lat: Number(<?= $_GET['latitude'] ?>), lng: Number(<?= $_GET['longitude'] ?>)};
                map = new google.maps.Map(document.getElementById('map'), {
                    center: latlng,
                    zoom: 14
                });
            var panorama = new google.maps.StreetViewPanorama(
                document.getElementById('pano'), {
                    position: latlng,
                    pov: {
                      heading: 34,
                      pitch: 10
                    }
            });
            map.setStreetView(panorama);
            }
        </script>
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRyIx95DIw0i8hWbd9i5R61UVBJTeQhtw&callback=initialize">
        </script>
    </body>
</html>
