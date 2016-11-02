<?php
    // Set mongodb host and database names
    $dbhost = 'localhost';
    $dbname = 'boogle';

    // Set paths to yelp dataset json files
    $json_business = 'yelp_academic_dataset_business.json';
    $json_checkin = 'yelp_academic_dataset_checkin.json';
    $json_review = 'yelp_academic_dataset_review.json';
    $json_tip = 'yelp_academic_dataset_tip.json';
    $json_user = 'yelp_academic_dataset_user.json';

    // Connect to mongodb database
    $m = new MongoClient();
    $db = $m->$dbname;

    // Open each dataset json file, read line by line, and insert in to the database
    // Business dataset
    $handle = fopen($json_business, "r");
    if ($handle) {
        echo "Inserting from $json_business ...";
        while ($line = fgets($handle)) {
			$business = json_decode($line, true);
			$db->business->insert($business);
        }
        fclose($handle);
        echo " done.\n";
    }
    else {
            echo "error opening $json_business\n";
    }

    // Checkin dataset
    $handle = fopen($json_checkin, "r");
    if ($handle) {
        echo "Inserting from $json_checkin ... ";
        while ($line = fgets($handle)) {
			$checkin = json_decode($line, true);
			$db->checkin->insert($checkin);
        }
        fclose($handle);
        echo "done.\n";
    }
    else {
        echo "error opening $json_checkin\n";
    }

    // Review dataset
    $handle = fopen($json_review, "r");
    if ($handle) {
        echo "Inserting from $json_review ... ";
        while ($line = fgets($handle)) {
			$review = json_decode($line, true);
			$db->review->insert($review);
        }
        fclose($handle);
        echo "done.\n";
    }
    else {
        echo "error opening $json_review\n";
    }

    // Tip dataset
    $handle = fopen($json_tip, "r");
    if ($handle) {
        echo "Inserting from $json_tip ... ";
        while ($line = fgets($handle)) {
			$tip = json_decode($line, true);
			$db->tip->insert($tip);
        }
        fclose($handle);
        echo "done.\n";
    } else {
        echo "error opening $json_tip\n";
    }

    // User dataset
    $handle = fopen($json_user, "r");
    if ($handle) {
        echo "Inserting from $json_user ... ";
        while ($line = fgets($handle)) {
			$user = json_decode($line, true);
			$db->user->insert($user);
        }
        fclose($handle);
        echo "done.\n";
    }
    else {
        echo "error opening $json_user\n";
    }
?>