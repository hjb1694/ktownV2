<?php 

require '../conf/init.php';

if(!isset($bizId)){
    die();
}

if(!isset($bizActId)){
    die();
}

$couponsDeals = new CouponsDeals($pdo);

$deals = $couponsDeals->getDealsByBizId($bizId);

include 'views/bizMgr.view.php';