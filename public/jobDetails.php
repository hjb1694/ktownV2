<?php 

require '../conf/init.php';

if(!isset($_GET['id'])){
    Helpers::redirect('jobs.php');
    die();
}
if(!is_numeric($_GET['id'])){
    Helpers::redirect('notFound.php');
    die();
}

$jobId = (int) $_GET['id'];

$jobs = new Jobs($pdo);

$job = $jobs->getJobById($jobId);

if(!$job){
    Helpers::redirect('notFound.php');
    die();
}

function yesorno($item){

    if($item == 1){
        return 'Yes';
    } else {
        return 'No';
    }

}

include 'views/jobDetails.view.php';