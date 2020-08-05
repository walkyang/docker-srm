<?php
    echo "hello ，I'm srm-002 <br />";
    //连接本地的 Mysql 服务
    $redis = new Redis();
    $redis->connect('172.20.0.14', 6379);//serverip port
    $redis ->set("srm" , "srm-001 redis");
    echo $redis ->get("srm");
?>