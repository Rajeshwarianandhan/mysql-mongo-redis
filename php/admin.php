<?php
session_start();
include "mysql.php";
require  '../vendor/autoload.php';

try{
    $client = new MongoDB\Client("mongodb+srv://Rajeshwari:Rajeshwari2712@mycluster.5w5an3j.mongodb.net/userdb");
    $collection = $client->userdb->admin;

}catch (Exception $e) {
        echo "Couldn't connected to mongodb atlas";
        echo $e->getMessage();
}

if(isset($_POST['email'])&&isset($_POST['password'])){
    $emailad=$_POST["email"];
    $password=$_POST["password"];
    // mysql query
    $stmt=$conn->prepare("SELECT * FROM admin WHERE email=?");
    $stmt->bind_param("s",$emailad);
    $stmt->execute();
    $result=$stmt->get_result();
    if($result->num_rows > 0){
        while($result->fetch_assoc()){

        }
    }
    // mongo query
    $login = array('email'=>$emailad,'password'=>$password);
    $result = $collection->findOne($login);
    if($result == null){
        echo json_encode(['status'=>'error']);
    }else{
        if($password === $password){         
            $emailad = $result['email'];
            $password = $result['password'];
            $_SESSION['ad_email'] =$emailad;       
            echo json_encode(['status'=>'success']);
        }
    }
}
?>


