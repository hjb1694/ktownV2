<?php 

require '../conf/init.php';


$dining = new Dining($pdo);

$allDiningListings = $dining->fetchAllDining();

$tags = $dining->fetchAllTags();





include 'views/dining.view.php';