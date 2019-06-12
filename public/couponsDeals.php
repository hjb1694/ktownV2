<?php 

require '../conf/init.php';

$couponsDeals = new CouponsDeals($pdo);

$allDeals = $couponsDeals->getAllDeals();

include 'views/couponsDeals.view.php';