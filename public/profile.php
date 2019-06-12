<?php 

require '../conf/init.php';

if(!isset($_GET['id'])){
Helpers::redirect('index.php');
die();
} 

if(!is_numeric($_GET['id'])){
Helpers::redirect('notFound.php');
die();
}

$id = $_GET['id'];

$user = new User($pdo);

$profile = $user->getProfile($id);

if(!$profile){
    Helpers::redirect('notFound.php');
    die();
}



include 'views/profile.view.php';