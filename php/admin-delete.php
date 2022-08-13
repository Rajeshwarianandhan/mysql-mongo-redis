<?php

include "config.php";
include "mysql.php";
// mysql query
if(isset($_POST['del_btn'])){
$email=$_POST['del_email'];
$query = $conn->prepare("DELETE FROM users WHERE email=?");
$query->bind_param("s",$email);
$query->execute();
// mongo query
$query = $collection->deleteOne(["email"=>$email]);
header("location:dashboard.php");
}else{
    echo json_encode(['status'=>'error']);
}
?>