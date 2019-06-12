<?php 

require '../conf/init.php';

if(!isset($uid)){
    Helpers::redirect('index.php');
    die();
}

$user = new User($pdo);

$userInfo = $user->getProfile($uid);

include 'views/editProfile.view.php';