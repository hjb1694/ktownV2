<?php 

require '../conf/init.php';

if(!isset($_GET['id'])){
    Helpers::redirect('discussionsMain.php');
    die();
} 

if(!is_numeric($_GET['id'])){
    Helpers::redirect('notFound.php');
    die();
}

$postId = (int) $_GET['id'];

$posts = new Posts($pdo);
$likesAndDislikes = new LikesAndDislikes($pdo);

$forumPost = $posts->getPostById($postId);

if(!$forumPost){
    Helpers::redirect('notFound.php');
}

$postComments = new PostComment($pdo);

$postReplies = $postComments->getAllCommentsByPostId($forumPost->postId);


include 'views/discussionPost.view.php';