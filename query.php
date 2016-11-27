<?php
    /*  Connect to the mongodb database, perform query, return json results
        Query parameters are passed via the URL as GET parameters, e.g.:
    
        query.php?keyword=bars&city=phoenix&rating=4

        Rating is optional and set to 0 if omitted
    */    

    // Get search parameters to pass to the query function
    $keyword = $_GET['keyword'];
    $city = $_GET['city'];
    $rating = $_GET['rating'];
    $sort = $_GET['sort'];

    // Set the mongodb host and database names
    $dbhost = 'localhost';
    $dbname = 'boogle';

    // Connect to the mongodb database
    $m = new MongoClient();
    $db = $m->$dbname;

    // If no star rating is specified, set the rating to 0 by defult
    if(empty($rating)){
        $rating = 0;
    }
    else{
        $rating = doubleval($rating);
    }
    if(empty($sort)){
        $sort = -1;
    }
    else{
        $sort = intval($sort);
    }

    // Set content type in header for easy viewing in browser
    header("Content-type: application/json");

    // Perform the search query
    if(isset($city, $keyword, $rating, $sort)){
        search($db, $keyword, $city, $rating, $sort);
    }
    else{
        echo "Missing required parameter(s)";
    }

    // Performs the mongodb query and returns results in json encoded format
    function search($db, $keyword, $city, $rating, $sort){
        $query = array('city' => new MongoRegex('/.*'.$city.'.*/i'),
                'categories' => new MongoRegex('/.*'.$keyword.'.*/i'),
                'stars' => array('$gte' => $rating));
        $result = $db->business->find($query)->sort(array('stars' => $sort));
        echo json_encode(iterator_to_array($result, false));
    }
?>
