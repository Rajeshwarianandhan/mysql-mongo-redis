<?php

include "config.php";
include "mysql.php";

if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['mobile'])&&isset($_POST['dob'])){
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $mobile =trim($_POST['mobile']);
    $dob = trim($_POST['dob']);
    // mysql query
    $stmt = $conn->prepare("INSERT INTO users (fname,lname,email,password,mobile,dob)
    VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss",$fname,$lname,$email,$password,$mobile,$dob);
    if($stmt->execute())
    // mongo query
    $result = $collection->insertOne([
    'fname' => $fname,
    'lname' => $lname,
    'email' => $email,
    'password' => $password,
    'mobile' => $mobile,
    'dob' => $dob
    ]);
    echo json_encode(['status'=>'success']);
}
else{
    echo json_encode(['status'=>'error']);
}
?>