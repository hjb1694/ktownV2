<?php 

require '../conf/init.php';

$posts = new Posts($pdo);

$allPosts = $posts->getAllPosts();

include 'views/discussionsMain.view.php';