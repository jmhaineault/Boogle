<?php
    /*  Connect to the mongodb database, perform query, return json results
        Query parameters are passed via the URL as GET parameters, e.g.:
    
        reviews.php?id=vcNAWiLM4dR7D2nwwJ7nCA
    */    

    // Get search parameters to pass to the query function
    $lat = $_GET['latitude'];
    $lng = $_GET['longitude'];

    // Set the mongodb host and database names
    $dbhost = 'localhost';
    $dbname = 'boogle';

    // Connect to the mongodb database
    $m = new MongoClient();
    $db = $m->$dbname;

    // Set content type in header for easy viewing in browser
    header("Content-type: application/json");

    if(isset($lat,$lng)){
        search($db, $lat, $lng);
    }
    else{
        echo "Missing required parameter(s)";
    }

    // Performs the mongodb query and returns results in json encoded format
    function search($db, $lat, $lng){
        $query = array('latitude' => $lat,
                        'longitude' => $lng);
                        
        $result = $db->review->find($query);
        echo json_encode(iterator_to_array($result, false));
    }

?>
<script type="text/javascript">
function initialize() {
  var latlng = {lat: $lat, lng: $lng};
  var map = new google.maps.Map(document.getElementById('map'), {
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