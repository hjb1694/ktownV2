<?php 
ob_start();
session_start();

require '../vendor/autoload.php';


//Session
$uid = $_SESSION['uid'] = 1;
$uname = $_SESSION['uname'] = 'hbradfield';

$bizActId = $_SESSION['bizactid'] = null;
$bizId = $_SESSION['bizid'] = null;
$bizName = $_SESSION['bizName'] = null;


$env = require 'env.php';
require '../classes/UserPts.php';
require '../classes/Helpers.php';
require '../classes/db.php';
require '../classes/Posts.php';
require '../classes/Validation.php';
require '../classes/PostComment.php';
require '../classes/Report.php';
require '../classes/LikesAndDislikes.php';
require '../classes/User.php';
require '../classes/Dining.php';
require '../classes/CouponsDeals.php';
require '../classes/Jobs.php';


require '../classes/Models/PostModel.php';
require '../classes/Models/CommentModel.php';
require '../classes/Models/ReportModel.php';
require '../classes/Models/DealModel.php';
require '../classes/Models/JobModel.php';

$pdo = Database::connection($env['database']);

