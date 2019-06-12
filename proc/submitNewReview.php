<?php 
require '../conf/init.php';

if(!isset($uid)){
    die();
}
if(!isset($_POST['dinId'])){
    die();
}
if(!isset($_POST['overall'])){
    die();
}
if(!isset($_POST['cleanliness'])){
    die();
}
if(!isset($_POST['service'])){
    die();
}
if(!isset($_POST['selection'])){
    die();
}
if(!isset($_POST['quality'])){
    die();
}
if(!isset($_POST['narrative'])){
    die();
}

$overall = (int) $_POST['overall'];
$cleanliness = (int) $_POST['cleanliness'];
$service = (int) $_POST['service'];
$selection = (int) $_POST['selection'];
$quality = (int) $_POST['quality'];
$narrative = trim($_POST['narrative']);
$dinId = (int) $_POST['dinId'];


$errs = 0;

function checkRating($item){

    $arr = [1,2,3,4,5];

    if(in_array($item,$arr)){
        return true;
    }
    return false;
}

if(!checkRating($overall)){
    $errs++;
}
if(!checkRating($cleanliness)){
    $errs++;
}
if(!checkRating($service)){
    $errs++;
}
if(!checkRating($selection)){
    $errs++;
}
if(!checkRating($quality)){
    $errs++;
}
if(strlen($narrative) < 50){
    $errs++;
}

if($errs){
    echo 1;
} else {

    $dining = new Dining($pdo);

    if($dining->checkIfRatingExists($uid, $dinId)->count > 0){
        echo 1;
    } else {

        $result = $dining->insertNewReview($dinId,$uid,$overall,$cleanliness,$service,$selection,$quality,$narrative);
        if(!$result){
            echo 1;
        } else {
            echo 2;
        }

    }

}