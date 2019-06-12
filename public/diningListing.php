<?php 

require '../conf/init.php';

if(!isset($_GET['id'])){
    Helpers::redirect('dining.php'); 
    die();
}

if(!is_numeric($_GET['id'])){
    Helpers::redirect('notFound.php');
    die();
}

$id = (int) $_GET['id'];

$dining = new Dining($pdo);

$listing = $dining->getListing($id);

if(!$listing){
    Helpers::redirect('notFound.php'); 
    die();
}

$ratingAvg = $dining->getRatingAvgs($id);


include 'views/diningListing.view.php';