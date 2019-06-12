<?php 

require '../conf/init.php';

$jobs = new Jobs($pdo);

$allJobs = $jobs->getAllJobs();

include 'views/jobs.view.php';