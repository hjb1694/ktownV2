<?php 


class Posts{

    protected $pdo;

    function __construct($pdo){

        $this->pdo = $pdo;

    }

    public function getPostsCountWithin24Hours(int $userId){

        $qry = '
        SELECT COUNT(*) AS count
        FROM forum_posts 
        WHERE owner_id = :ownerId 
        AND post_created >= NOW() - INTERVAL 1 DAY
        ';

        $qry = $this->pdo->prepare($qry);
        $qry->execute([
            'ownerId' => $userId
        ]);
        $result = $qry->fetch(PDO::FETCH_OBJ);

        return $result->count;

    }

    public function insertNewPost(UserPts $userPts, PostModel $postModel, $ownerId){

        $qry = '
        INSERT INTO forum_posts(owner_id,post_cat,post_title,post_content,is_anon)
        VALUES(:ownerid,:postCat,:title,:content,:anon)
        ';
        $insertPost = $this->pdo->prepare($qry);
        $insertPost->execute([
            'ownerid' => $ownerId, 
            'title' => htmlspecialchars($postModel->getTitle(), ENT_QUOTES), 
            'content' => htmlspecialchars($postModel->getContent(), ENT_QUOTES), 
            'postCat' => $postModel->getCategory(),
            'anon' => $postModel->getAnon()
        ]);

        $userPts->addPts($ownerId, 3);

    }

    public function getAllPosts(){

        $qry = '
        SELECT fp.id AS postId, user.username AS postOwner, cat.category AS postCat, fp.post_title AS postTitle, fp.post_content AS postContent, fp.post_created AS createdDate, up.image AS profileImage
        FROM forum_posts fp JOIN users user ON fp.owner_id = user.id
        JOIN post_cats cat ON fp.post_cat = cat.id
        JOIN user_profile up ON user.id = up.user_id
        WHERE fp.is_removed = 0
        ORDER BY fp.post_created DESC
        LIMIT 100
        ';

        $getPosts = $this->pdo->prepare($qry);
        $getPosts->execute();
        $result = $getPosts->fetchAll(PDO::FETCH_OBJ);

        return $result;

    }

    public function getPostById(int $postId){

        $qry = '
        SELECT fp.id AS postId, user.username AS postOwner, cat.category AS postCat, fp.post_title AS postTitle, fp.post_content AS postContent, fp.post_created AS createdDate, up.image AS profileImage
        FROM forum_posts fp JOIN users user ON fp.owner_id = user.id
        JOIN post_cats cat ON fp.post_cat = cat.id
        JOIN user_profile up ON user.id = up.user_id
        WHERE fp.id = :postId AND fp.is_removed = 0
        ';

        $postById = $this->pdo->prepare($qry);
        $postById->execute([
            'postId' => $postId
        ]);
        return $result = $postById->fetch(PDO::FETCH_OBJ);

    }

}

