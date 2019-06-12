<?php 
require '../conf/init.php';

if(!isset($uid)){
    die();
}

if(!isset($_POST['image'])){
    die();
}

$user = new User($pdo);

$imgData = $_POST['image'];

$imageArray1 = explode(';',$imgData);

$imageArray2 = explode(',',$imageArray1[1]);

$data = base64_decode($imageArray2[1]);

$imageName = time() . '.png';

file_put_contents($imageName,$data);

$imageFile = file_get_contents($imageName);

$user->insertProfilePic($uid, $imageFile);

echo $data;

unlink($imageName);