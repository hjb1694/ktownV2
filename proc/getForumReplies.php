<?php 
if(!isset($_GET['postId'])){
    die();
}

$postId = $_GET['postId'];

require '../conf/init.php';

$posts = new PostComment($pdo);
$likesDislikes = new LikesAndDislikes($pdo);

$comments = $posts->getAllCommentsByPostId($postId);

$data = [];
$errors = [];

if(!$comments){

    array_push($errors, [
        "There was an issue processing your request"
    ]);

    echo json_encode($errors);

}else{

    foreach($comments as $comment){

        $likes = $likesDislikes->getReplyLikes($comment->replyId); 
        $dislikes = $likesDislikes->getReplyDislikes($comment->replyId);


        array_push($data,[
            'replyId' => $comment->replyId,
            'owner' => $comment->owner,
            'content' => htmlspecialchars_decode($comment->content), 
            'created at' => $comment->createdAt, 
            'profileImage' => base64_encode($comment->profileImage),
            'likes' => $likes->likes, 
            'dislikes' => $dislikes->dislikes
        ]);

    }

    echo json_encode($data);

}