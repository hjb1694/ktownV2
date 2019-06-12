<?php 

require '../conf/init.php';

if(!isset($uid)){
    Helpers::redirect('index.php');
    die();
}

$postsLimited = null;

$posts = new Posts($pdo);

if($posts->getPostsCountWithin24Hours($uid) >= 3){
    $postsLimited = true;
}

include 'views/createDiscussion.view.php';