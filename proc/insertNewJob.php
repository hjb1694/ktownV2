<?php 

require '../conf/init.php';

if(!isset($bizId)){
    die();
}
if(!isset($_POST['title'])){
    die();
}
if(!isset($_POST['category'])){
    die();
}
if(!isset($_POST['type'])){
    die();
}
if(!isset($_POST['location'])){
    die();
}
if(!isset($_POST['salRangeStart'])){
    die();
}
if(!isset($_POST['salRangeEnd'])){
    die();
}
if(!isset($_POST['salaryType'])){
    die();
}
if(!isset($_POST['health'])){
    die();
}
if(!isset($_POST['vision'])){
    die();
}
if(!isset($_POST['dental'])){
    die();
}
if(!isset($_POST['retirement'])){
    die();
}
if(!isset($_POST['flex'])){
    die();
}
if(!isset($_POST['paid'])){
    die();
}
if(!isset($_POST['fitness'])){
    die();
}
if(!isset($_POST['details'])){
    die();
}
if(!isset($_POST['requirements'])){
    die();
}


$jobModel = new JobModel($_POST['title'],$_POST['category'],$_POST['type'],$_POST['location'],
$_POST['salRangeStart'],$_POST['salRangeEnd'],$_POST['salaryType'],$_POST['health'],$_POST['vision'],
$_POST['dental'],$_POST['retirement'],$_POST['paid'],$_POST['flex'],$_POST['fitness'],$_POST['details'],$_POST['requirements']);


$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);
$jobModel->setNewDetails($purifier->purify($jobModel->getDetails()));

$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);
$jobModel->setNewRequirements($purifier->purify($jobModel->getRequirements()));

$jobs = new Jobs($pdo);

$result = $jobs->addJob($jobModel, $bizId);

if(!$result){
    echo 1;
}else{
    echo 2;
}


