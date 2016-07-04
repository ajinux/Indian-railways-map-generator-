 <!DOCTYPE html>
<html>
<head>
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(23.4367315,75.9495522),
    zoom:4,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}


function initMap() {
/*var chicago = {lat: 28.6139391, lng: 77.2090212};
  var indianapolis = {lat: 31.5978111, lng: 74.6019776};
  */
  var chicago = {lat: <?php echo $_POST['fromlat'];?>, lng: <?php echo $_POST['fromlong'];?>};
  var indianapolis = {lat: <?php echo $_POST['tolat'];?>, lng:  <?php echo $_POST['tolong'];?>};
  var map = new google.maps.Map(document.getElementById('googleMap'), {
    center: chicago,
    scrollwheel: true,
    zoom: 11
  });

  var directionsDisplay = new google.maps.DirectionsRenderer({
    map: map
  });

  // Set destination, origin and travel mode.
  var request = {
    destination: indianapolis,
    origin: chicago,
    travelMode: google.maps.TravelMode.DRIVING
  };
   var directionsService = new google.maps.DirectionsService();
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      // Display the route on the map.
      directionsDisplay.setDirections(response);
 }
  });
}
google.maps.event.addDomListener(window, 'load', initMap);
</script>
</head>

<body>
<div id="googleMap" style="width:1250px;height:650px;"></div>

<?php
 echo "<br>From latitude:".$_POST['fromlat'];
 echo "<br>From longitude:".$_POST['fromlong'];
 echo "<br>TO latitude :".$_POST['tolat'];
 echo "<br>To longitude :".$_POST['tolong'];
?>

</body>

</html> 