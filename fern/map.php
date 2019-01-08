<!DOCTYPE html>
<html>
  <head>
    <title>Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
	
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      function initMap() {
        var mapOptions = {
			center: {lat: 14.8803505, lng: 102.0156959},
			zoom: 15,	
		}
		var maps = new google.maps.Map(document.getElementById("map"), mapOptions);
		var marker, info;
			$.getJSON("jsondata.php", function(jsonObj){
				$.each(jsonObj, function(i, item){
						marker = new google.maps.Marker({
						animation: google.maps.Animation.DROP,
						position: new google.maps.LatLng(item.lat, item.lng),
						map: maps,
					});
					info = new google.maps.InfoWindow();
					google.maps.event.addListener(marker, 'click', (function(marker, i){
						return function(){
							if (marker.getAnimation() !== null){
								marker.setAnimation(null)
							}else{
								marker.setAnimation(google.maps.Animation.BOUNCE);
							}
							info.setContent(item.dep_name);
							info.open(maps, marker);
						}
					})(marker, i));
				});
			});
	  }
    
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCXkgT4Hw83wzhkNsSJ05qL_dMkzX8EsuE&callback=initMap"
    async defer></script>
  </body>
</html>