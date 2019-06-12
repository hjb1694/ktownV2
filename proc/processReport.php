<?php 
require '../conf/init.php';

$errors = 0;

if(!isset($_POST['id'])){
    die();
}
if(!isset($_POST['reason'])){
    die();
}
if(!isset($_POST['comments'])){
    die();
}
if(!isset($_POST['type'])){
    die();
}

$reportModel = new ReportModel($_POST['id'],$_POST['type'],$_POST['reason'],$_POST['comments']);

if(!Validation::validateReport($reportModel)){
    echo json_encode(['msg' => 'Sorry, there was an error processing your request.']);
    die();
}

$report = new Report($pdo);

$report->insertReport($reportModel);


echo json_encode(['msg' => 'Thank you for your report. We will review it shortly.']);



