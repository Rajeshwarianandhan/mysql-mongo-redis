<?php

include "config.php";
include "mysql.php";
include "redis.php";

if(isset($_POST['email'])&&isset($_POST['password'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    // mysql query
    $stmt=$conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result=$stmt->get_result();
    if($result->num_rows > 0){
        while($result->fetch_assoc()){

        }
    }
    // mongo query
    $login = array('email'=>$email,'password'=>$password);
    $result = $collection->findOne($login);
    $redis->set("profile",json_encode($result));
    if($result == null){
        echo json_encode(['status'=>'error']);
    }else{
        $email = $result['email'];
        $password = $result['password'];
        if($password === $password){
            echo json_encode(['status'=>'success']);
        }
    }
}
?>