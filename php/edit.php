<?php

include "config.php";
include "mysql.php";
include "redis.php";

if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])  && isset($_POST['password'])  && isset($_POST['mobile']) && isset($_POST['dob'])){
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $mobile =trim($_POST['mobile']);
    $dob = trim($_POST['dob']);
    // mysql query
    $stmt=$conn->prepare("UPDATE users SET fname=?,lname=?,password=?,mobile=?,dob=? WHERE email=?");
    $stmt->bind_param("ssssss",$fname,$lname,$password,$mobile,$dob,$email);
    $stmt->execute();
    if($stmt->affected_rows > 0){
    // mongodb query
    $update = $collection->updateOne(array('email'=>$email),
    array('$set'=>array('fname'=>$fname,'lname'=>$lname,'email'=>$email,
    'password'=>$password,'mobile'=>$mobile,'dob'=>$dob)));
    if($update){
        $qry=array('email'=>$email);
        $result=$collection->findOne($qry);
        $redis->set("profile",json_encode($result));
        echo json_encode(['status' => 'success']);
    }
    }else{
        echo json_encode(['status'=>'error']);
    }
}
?>