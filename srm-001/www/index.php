<?php
     echo "hello ，I'm srm-001 <br />";
     //连接本地的 Mysql 服务
     $conn = mysqli_connect('172.20.0.23','root','123456');
    if($conn){
        echo 'srm-002数据库连接成功！<br />';
    }else{
        echo '数据库连接失败！<br />';
    }
    echo phpinfo();
?>