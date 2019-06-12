<?php 

class CommentModel {

    protected $userId; 
    protected $postId; 
    protected $comment;


    function __construct(int $userId, int $postId, $comment)
    {

        $this->userId = $userId; 
        $this->postId = $postId; 
        $this->comment = $this->sanit($comment);

    }

    public function sanit($item){

        return trim(strip_tags($item,'<strong><b><br><s><del><i><em><u><span><p><a>'));

    }

    public function getUserId()
    {

        return $this->userId;

    }

    public function getPostId(){

        return $this->postId;

    }

    public function getComment(){

        return $this->comment;

    }

    public function setNewComment($comment)
    {

        $this->comment = $this->sanit($comment);

    }



}