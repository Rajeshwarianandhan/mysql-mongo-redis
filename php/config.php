<?php

require  '../vendor/autoload.php';

try{
$client = new MongoDB\Client("mongodb+srv://Rajeshwari:Rajeshwari2712@mycluster.5w5an3j.mongodb.net/userdb");
$collection = $client->userdb->users;

}catch (Exception $e) {
    echo "Couldn't connected to mongodb atlas";
    echo $e->getMessage();
}

?>