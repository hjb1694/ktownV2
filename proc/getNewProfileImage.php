<?php 

require '../conf/init.php';

if(!isset($uid)){
    die();
}

$user = new User($pdo);

echo base64_encode($user->getProfilePic($uid));
