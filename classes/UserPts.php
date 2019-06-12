<?php 

class UserPts {

    protected $pdo;

    function __construct($pdo){

        $this->pdo = $pdo;

    }


    public function addPts($userId, $pts){

        $qry = '
        UPDATE users 
        SET lifetime_pts = lifetime_pts + :pts, current_pts = current_pts + :pts
        WHERE id = :id
        ';

        $addPts = $this->pdo->prepare($qry);
        $addPts->execute([
            'pts' => $pts, 
            'id' => $userId
        ]);


    }






}