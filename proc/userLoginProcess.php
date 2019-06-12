<?php 
require '../conf/init.php';

if(!isset($_POST['email'])){
    die();
}
if(!isset($_POST['password'])){
    die();
}

$providedEmail = strtolower($_POST['email']);
$providedPassword = $_POST['password'];


$qry = '
SELECT id, email, username, password 
FROM users 
WHERE email = :email
';

$getCredentials = $pdo->prepare($qry);
$getCredentials->execute([
    'email' => $providedEmail
]);
$result = $getCredentials->fetch(PDO::FETCH_OBJ);

if(!$result){
    echo 1;
    die();
}

if(!password_verify($providedPassword, $result->password)){
    echo 1; 
    die();
} else {

    $_SESSION['uid'] = $result->id; 
    $_SESSION['uname'] = $result->username;
    $_SESSION['bizactid'] = null;
    $_SESSION['bizid'] = null;
    $_SESSION['bizName'] = null;

    echo 2;

}






