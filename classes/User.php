<?php 


class User
{

    protected $pdo;

    function __construct($pdo)
    {

        $this->pdo = $pdo;


    }


    public function getProfile(int $uid)
    {

        $qry = '
        SELECT u.username AS username, u.current_pts AS currentPts, u.user_role AS role, u.join_date AS dateJoined, p.bio AS bio, p.occupation AS occupation, 
        p.image AS profileImage, p.is_private AS isPrivate
        FROM users u JOIN user_profile p 
        ON u.id = p.user_id
        WHERE u.id = :uid
        ';

        $getProfile = $this->pdo->prepare($qry); 
        $getProfile->execute([
            'uid' => $uid
        ]);
        return $result = $getProfile->fetch(PDO::FETCH_OBJ);


    }

    public function insertProfilePic(int $uid, $blob)
    {

        $qry = '
        UPDATE user_profile
        SET image = :blob
        WHERE user_id = :userId
        ';

        $insertImg = $this->pdo->prepare($qry); 
        $insertImg->execute([
            'blob' => $blob, 
            'userId' => $uid
        ]);


    }

    public function getProfilePic(int $uid)
    {
        $qry = '
        SELECT image 
        FROM user_profile 
        WHERE user_id = :userId
        ';
        $getImg = $this->pdo->prepare($qry);
        $getImg->execute([
            'userId' => $uid
        ]);
        return $result = $getImg->fetch(PDO::FETCH_OBJ)->image;


    }

    public function updateProfile(int $uid, $bio, $occupation, $private)
    {


        if($private == 'true'){
            $private = 1;
        }else{
            $private = 0;
        }

        $qry = '
        UPDATE user_profile
        SET bio = :bio, occupation = :occupation, is_private = :private
        WHERE user_id = :userId
        ';
        $update = $this->pdo->prepare($qry);
        $update->execute([
            'bio' => $bio, 
            'occupation' => $occupation, 
            'private' => $private, 
            'userId' => $uid
        ]);
        return $update->rowCount();

    }



}