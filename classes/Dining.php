<?php 

class Dining{

    protected $pdo; 

    function __construct($pdo){

        $this->pdo = $pdo;

    }


    public function fetchAllDining()
    {

        $qry = '
        SELECT bl.id AS id, bl.business_name AS name, bl.business_street AS street, bl.business_city AS city, bl.business_zip AS zip, ROUND(AVG(dr.overall_rating)) AS overall_rating, GROUP_CONCAT(dt.type) AS types
        FROM business_listings bl 
        JOIN dining_listing_types dlt
        ON bl.id = dlt.listing_id 
        JOIN dining_types dt 
        ON dlt.type_id = dt.id
        LEFT JOIN dining_listing_ratings dr 
        ON bl.id = dr.listing_id
        GROUP BY bl.id, bl.business_name
        ';

        $getAll = $this->pdo->query($qry);
        return $result = $getAll->fetchAll(PDO::FETCH_OBJ);

    }

    public function fetchAllTags()
    {

        $qry = '
        SELECT id, tag
        FROM dining_tags
        ';
        $getTags = $this->pdo->query($qry);
        return $result = $getTags->fetchAll(PDO::FETCH_OBJ);

    }

    public function getListing(int $id)
    {

        $qry = '
        SELECT business_name AS name, business_Street AS street, business_city AS city, business_zip AS zip, business_phone AS phone, lat AS lat, lon AS lon
        FROM business_listings 
        WHERE id = :id AND business_type = 1
        ';
        $getListing = $this->pdo->prepare($qry); 
        $getListing->execute([
            'id' => $id
        ]);
        return $result = $getListing->fetch(PDO::FETCH_OBJ);


    }


    public function getRatingAvgs(int $id)
    {
        $qry = '
        SELECT AVG(overall_rating) AS overall, AVG(cleanliness_rating) AS cleanliness, AVG(service_rating) AS service, AVG(selection_rating) AS selection, 
        AVG(quality_rating) AS quality
        FROM dining_listing_ratings 
        WHERE listing_id = :id
        ';

        $getRatings = $this->pdo->prepare($qry); 
        $getRatings->execute([
            'id' => $id
        ]); 
        return $result = $getRatings->fetch(PDO::FETCH_OBJ);
    }

    public function checkIfRatingExists(int $uid, int $dinId)
    {

        $qry = '
        SELECT COUNT(*) AS count FROM dining_listing_ratings 
        WHERE listing_id = :dinId AND user_id = :uid
        ';

        $getCount = $this->pdo->prepare($qry); 
        $getCount->execute([
            'dinId' => $dinId, 
            'uid' => $uid
        ]);
        return $result = $getCount->fetch(PDO::FETCH_OBJ);



    }

    public function getListingReviews(int $id)
    {
        $qry = '
        SELECT u.username AS username, r.user_id AS userId, r.overall_rating AS overall, r.selection_rating AS selection, r.service_rating AS service,
        r.cleanliness_rating AS cleanliness, r.quality_rating AS quality, r.review AS review, r.review_shown AS reviewShown, r.created_at AS createdAt
        FROM dining_listing_ratings r
        JOIN users u 
        ON r.user_id = u.id
        WHERE r.listing_id = :listingId
        ';
        $getReviews = $this->pdo->prepare($qry); 
        $getReviews->execute([
            'listingId' => $id
        ]);
        return $result = $getReviews->fetchAll(PDO::FETCH_OBJ);
    }

    public function insertNewReview($dinId,$uid,$overall,$cleanliness,$service,$selection,$quality,$narrative){

        $qry = '
        INSERT INTO dining_listing_ratings(listing_id,user_id,overall_rating,cleanliness_rating,service_rating,selection_rating,quality_rating,review)
        VALUES(:listingId,:userId,:overall,:cleanliness,:service,:selection,:quality,:review)
        ';
        $insert = $this->pdo->prepare($qry);
        $insert->execute([
            'listingId' => $dinId, 
            'userId' => $uid, 
            'overall' => $overall, 
            'cleanliness' => $cleanliness, 
            'service' => $service, 
            'selection' => $selection, 
            'quality' => $quality, 
            'review' => strip_tags($narrative)
        ]);
        return $result = $insert->rowCount();

    }


}