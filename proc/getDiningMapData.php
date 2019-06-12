<?php 

require '../conf/init.php';

$qry = '
SELECT business_name, lat, lon 
FROM business_listings
';

$getCoords = $pdo->query($qry);
$listings = $getCoords->fetchAll(PDO::FETCH_OBJ);

$data = [];

foreach($listings as $listing){

    array_push($data,[
        'name' => $listing->business_name, 
        'lat' => $listing->lat, 
        'lon' => $listing->lon
    ]);

}

echo json_encode($data);



