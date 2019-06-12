<?php 
require '../conf/init.php';

$errors = 0;

if(!isset($uid)){
    die();
}

if(!isset($_POST['postTitle'],$_POST['postContent'],$_POST['postCategory'])){

    die();

}else{

    $posts = new Posts($pdo);
    $userPts = new UserPts($pdo);
    $validation = new Validation();

    if($posts->getPostsCountWithin24Hours($uid) >= 3){

        $errors++;


    }else{

        $anon = 0;

        $postModel = new PostModel($_POST['postTitle'],$_POST['postContent'],$_POST['postCategory'],$anon);
        
        if($validation->validateNewPost($postModel)){

        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $postModel->setNewContent($purifier->purify($postModel->getContent()));

        $posts->insertNewPost($userPts,$postModel, $uid);

        } else {
            $errors++;
        }

        if($errors){
            echo 1;
        } else {
            echo 2;
        }

    }


}

