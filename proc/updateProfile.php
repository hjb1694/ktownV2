<?php 

require '../conf/init.php';

if(!isset($uid)){
    die();
}

if(!isset($_POST['bio'])){
    die();
}

if(!isset($_POST['occupation'])){
    die();
}

if(!isset($_POST['private'])){
    die();
}

$user = new User($pdo);

$affected = $user->updateProfile($uid, $_POST['bio'], $_POST['occupation'], $_POST['private']);

if($affected){
    echo 'Changes Saved';
}