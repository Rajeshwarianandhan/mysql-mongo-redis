<?php

include "config.php";
include "mysql.php";
include "redis.php";

$details= $redis->get('profile');
$data = json_decode($details);
$user = new stdClass();
$user->fname=$data->fname;
$user->lname=$data->lname;
$user->email=$data->email;
$user->password=$data->password;
$user->mobile=$data->mobile;
$user->dob=$data->dob;
$myJSON = json_encode($user);
echo $myJSON;

?>





