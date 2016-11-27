<?php
    /*  Connect to the mongodb database, perform query, return json results
        Query parameters are passed via the URL as GET parameters, e.g.:
    
        reviews.php?id=vcNAWiLM4dR7D2nwwJ7nCA
    */    

    // Get search parameters to pass to the query function
    $business_id = $_GET['id'];

    // Set the mongodb host and database names
    $dbhost = 'localhost';
    $dbname = 'boogle';

    // Connect to the mongodb database
    $m = new MongoClient();
    $db = $m->$dbname;

    // Set content type in header for easy viewing in browser
    header("Content-type: application/json");

    if(isset($business_id)){
        search($db, $business_id);
    }
    else{
        echo "Missing required parameter(s)";
    }

    // Performs the mongodb query and returns results in json encoded format
    function search($db, $business_id){
        $query = array('business_id' => $business_id);
        $result = $db->review->find($query);
        echo json_encode(iterator_to_array($result, false));
    }

?>