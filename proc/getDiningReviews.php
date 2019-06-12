<?php

require '../conf/init.php';

if(!isset($_GET['dinId'])){
    die();
}

$dinId = (int) $_GET['dinId'];

$dining = new Dining($pdo);

$data = [];

$allReviews = $dining->getListingReviews($dinId);

if(!$allReviews){
    echo json_encode(['err' => 'There are no reviews']);
}else{
    foreach($allReviews as $review){

        if($review->reviewShown == 0){
            $narrative = '[Deleted]';
        } else {
            $narrative = $review->review;
        }


        array_push($data,[
            'username' => $review->username, 
            'overall' =>  $review->overall, 
            'cleanliness' => $review->cleanliness, 
            'selection' => $review->selection, 
            'service' => $review->service, 
            'quality' => $review->quality, 
            'narrative' => $narrative, 
            'createdAt' => $review->createdAt
        ]);

        echo json_encode($data);

    }

}

