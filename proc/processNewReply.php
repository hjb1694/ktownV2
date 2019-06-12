<?php 
require '../conf/init.php';

if(!isset($uid)){
    die();
}

if(!isset($_POST['replyText'])){
    die();
}

if(!isset($_POST['postId'])){
    die();
}

$commentModel = new CommentModel($uid,$_POST['postId'],$_POST['replyText']);
$comments = new PostComment($pdo);
$userPts = new userPts($pdo);

$commentModel->setNewComment(Helpers::filterHTML($commentModel->getComment()));

$comments->insertReply($commentModel, $userPts);



