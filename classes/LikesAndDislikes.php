<?php 

class LikesAndDislikes{

    protected $pdo; 


    function __construct($pdo)
    {
        $this->pdo = $pdo;

    }

    public function getReplyLikes(int $replyId)
    {

        $qry = '
        SELECT COUNT(*) AS likes 
        FROM reply_likes_dislikes
        WHERE type = 1 AND reply_id = :replyId
        ';

        $getReplyLikes = $this->pdo->prepare($qry);
        $getReplyLikes->execute(['replyId' => $replyId]);
        return $result = $getReplyLikes->fetch(PDO::FETCH_OBJ);


    }

    
    public function getReplyDislikes(int $replyId)
    {

        $qry = '
        SELECT COUNT(*) AS dislikes
        FROM reply_likes_dislikes
        WHERE type = 0 AND reply_id = :replyId
        ';

        $getReplyLikes = $this->pdo->prepare($qry);
        $getReplyLikes->execute(['replyId' => $replyId]);
        return $result = $getReplyLikes->fetch(PDO::FETCH_OBJ);


    }

    public function checkIfReplyLikeExists(int $uid, int $replyId)
    {

        $qry = '
        SELECT COUNT(*) AS count 
        FROM reply_likes_dislikes
        WHERE user_id = :userId AND reply_id = :replyId
        ';

        $check = $this->pdo->prepare($qry);
        $check->execute([
            'userId' => $uid,  
            'replyId' => $replyId
        ]);
        $result = $check->fetch(PDO::FETCH_OBJ);

        if($result->count > 0){
            return true;
        }else{
            return false;
        }

    }

    public function insertReplyLikeDislike(int $userId, int $replyId, int $value)
    {
        $qry = '
        INSERT INTO reply_likes_dislikes(user_id,reply_id,type)
        VALUES(:userId,:replyId,:type)
        ';
        $insert = $this->pdo->prepare($qry); 
        $insert->execute([
            'userId' => $userId, 
            'replyId' => $replyId, 
            'type' => $value
        ]);


    }


    
}