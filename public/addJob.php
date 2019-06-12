<?php 

require '../conf/init.php';

if(!isset($bizId)){
    Helpers::redirect('index.php');
    die();
}

include 'views/addJob.view.php';