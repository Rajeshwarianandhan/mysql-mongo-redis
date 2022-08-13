<?php

require  '../vendor/autoload.php';

try {
    $redis = new Predis\Client(array(
        'host'=>'redis-19826.c264.ap-south-1-1.ec2.cloud.redislabs.com',
        'port'=>'19826',
        'password'=>'glA8a5jqNv3s36wWgciZpxo5asX6u7Yk'
    ));
} catch (Exception $e) {
    echo "couldn't connect to redis";
}
?>