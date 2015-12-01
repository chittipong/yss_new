<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Simple icons</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>

// This example adds a marker to indicate the position of Bondi Beach in Sydney,
// Australia.
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 4,
    center: {lat: -13.595395, lng: 100.769343}
  });

  var image = '../images/yss_marker_icon1.png';
  var beachMarker = new google.maps.Marker({
    position: {lat: -13.595395, lng: 100.769343},
    map: map,
    icon: image
  });
}

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCs1B8Yloku0HD6YUqcEygNBUHSTORvrq0&signed_in=true&callback=initMap"></script>
  </body>
</html>