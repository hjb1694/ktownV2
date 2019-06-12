<?php 

require '../conf/init.php';

if(!isset($bizId)){
    die();
}
if(!isset($_POST['title'])){
    die();
}
if(!isset($_POST['details'])){
    die();
}
if(!isset($_POST['restrictions'])){
    die();
}
if(!isset($_POST['startDate'])){
    die();
}
if(!isset($_POST['expireDate'])){
    die();
}


$dealModel = new DealModel($_POST['title'],$_POST['details'],$_POST['restrictions'],$_POST['startDate'],$_POST['expireDate']);

$dealsCoupons = new CouponsDeals($pdo);

$result = $dealsCoupons->insertNewDeal($dealModel, $bizId);

if(!$result){
    echo 1;
}else{
    echo 2;
}


