<?php 

require '../conf/init.php';

if(!isset($uid)){
    die();
}

if(!isset($_POST['id'])){
    die();
}

if(!isset($_POST['value'])){
    die();
}

if(!isset($_POST['type'])){
    die();
}

$id = (int) $_POST['id'];
$type = (int) $_POST['type'];
$value = (int) $_POST['value'];

$possibleValues = [0,1];

if(!in_array($value,$possibleValues)){
    die();
}

$likesdislikes = new LikesAndDislikes($pdo);


function replyHandler($likesdislikes, $uid, $id, $value){

    if($likesdislikes->checkIfReplyLikeExists($uid, $id)){
        die();
    }

    $likesdislikes->insertReplyLikeDislike($uid, $id, $value);
}




switch($type){
    case 2;
        replyHandler($likesdislikes, $uid, $id, $value);
    break;

}
