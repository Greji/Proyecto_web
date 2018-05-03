<!DOCTYPE html>
<html>
    <head>
        <title>Contacto</title>
        
        <style type="text/css">
            /* Set a size for our map container, the Google Map will take up 100% of this container */
            #map {
                width: 600px;
                height: 500px;
            }

        </style>
        
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmEAguhHnQRLjIib61lkvIs8GlAK7Mc4s"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script type="text/javascript">
            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);
        
            function init() {
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    zoom: 14,

                    center: new google.maps.LatLng(20.7102784,-103.4209049), // Plaza Andares

                    styles: [{"featureType":"administrative","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":"50"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"lightness":"30"}]},{"featureType":"road.local","elementType":"all","stylers":[{"lightness":"40"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"lightness":-25},{"saturation":-100}]}]
                };
                var mapElement = document.getElementById('map');
                var map = new google.maps.Map(mapElement, mapOptions);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(20.7102784,-103.4209049),
                    map: map,
                    title: 'Mapa'
                });
            }
        </script>
    </head>
    <body>
        <h1 align="center">¡Conoce nuestra ubicación!</h1>


        <div id="map" align="center" style="width:100%;height:300px"></div>
    </body>
</html>
