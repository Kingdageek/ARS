<?php

require_once "core/db.inc.php";

try {
    if (isset($_GET['id'], $_GET['owner'])) {
        $advert_id = (int) filter_var($_GET['id'], FILTER_SANITIZE_STRING);
        $owner = filter_var($_GET['owner'], FILTER_SANITIZE_URL);
    
        // Update the clicks for that id in db
    
        $sql = "UPDATE `adverts` SET `clicks` = `clicks`+1 WHERE `advert_id` = {$advert_id}";
        $pdo->exec($sql);
    
        // Redirect to ad_owner's website
        header("location:$owner");
        exit;
    }
} catch (Exception $e) {
    echo "An error occurred ", $e->getMessage();
}