<?php 


class PostComment {

    protected $pdo; 

    function __construct($pdo)
    {

        $this->pdo = $pdo;

    }

    public function getAllCommentsByPostId(int $postId)
    {

        $qry = '
        SELECT fc.id AS replyId, user.username AS owner, fc.reply_content AS content, fc.created_at AS createdAt, up.image AS profileImage
        FROM forum_replies fc 
        JOIN users user
        ON fc.owner_id = user.id 
        JOIN user_profile up
        ON user.id = up.user_id
        WHERE fc.post_id = :postId AND fc.is_shown = 1
        ORDER BY fc.created_at DESC
        ';


        $getReplies = $this->pdo->prepare($qry);
        $getReplies->execute(['postId' => $postId]);
        return $result = $getReplies->fetchAll(PDO::FETCH_OBJ);

    }

    public function insertReply(CommentModel $commentModel, UserPts $userPts)
    {

        $qry = '
        INSERT INTO forum_replies(post_id,owner_id,reply_content)
        VALUES(:postId,:ownerId,:content)
        ';

        $insert = $this->pdo->prepare($qry);
        $insert->execute([
            'postId' => $commentModel->getPostId(),
            'ownerId' => $commentModel->getUserId(),
            'content' => htmlspecialchars($commentModel->getComment())
        ]);

        $userPts->addPts($commentModel->getUserId(), 2);


    }





}