<?php
require_once 'db.inc.php';

$sql = "SELECT `advert_id`, `image`, `title`, `url` FROM `adverts` WHERE UNIX_TIMESTAMP() < `expires` AND `shown` = 0 ORDER BY `advert_id` ASC LIMIT 1";
$stmt = $pdo->query($sql);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $advert_id = $row['advert_id'];
    $image = $row['image'];
    $title = $row['title'];
    $url = $row['url'];

    echo '<a href="go.php?id='.$advert_id.'&owner='.$url.'" target="_blank"><img id="ad_img" title="'.$title.'" src="'.$image.'"></a>';

    // update db to indicate that this has been shown

    $query = "UPDATE `adverts` SET `shown` = 1, `impressions` = `impressions` + 1 WHERE `advert_id` = {$advert_id}";
    $pdo->exec($query);

    // Set `shown` back to 0 if every `shown` = 1

    $sql = "SELECT COUNT(`advert_id`) FROM `adverts` WHERE `shown` = 0";
    $stmt = $pdo->query($sql);
    $unshown_ads = $stmt->fetchColumn();

    if ($unshown_ads == 0) {
        // If all the ads have already been shown, update the entire `shown` column to zero
        $sql = "UPDATE `adverts` SET `shown` = 0";
        $pdo->exec($sql);
    }
}