# 基于Docker 部署lnrmp 环境

## 项目简介

Docker LNMP 是基于 docker-compose 开发的运行在 Docker 上的 LNMP 开发环境，包含 Nginx、 PHP、MySQL、Redis 等镜像，满足学习、开发和测试需求。

此次目标创建6台容器：
1、创建一个lnrmp镜像。单个创建方式
     进入目录 cd /srm-001/mysql
     执行Datafile 创建镜像 docker build -t php .
2、使用compose.yml来构建容器
     进入目录 cd srm-001
     docker-compose up -d
、、、

注意：1、外部通过不同的端口区分容器。 
          -p 80 9000 3306 6379
     2、内部访问通过内网段操作。
          docker network create --subnet=172.20.0.1/16 --gateway 172.20.0.1  network-srm//创建网段
          docker network rm network-srm //删除
          docker network inspect bridge //查看

          1、生成容器的指定参数 --network=network-srm --ip-172.20.0.11指定容器使用的网络段和ip。
          2、可以进入容器通过ifconfig 查看ip指定是否成功。
   
          3、https://www.cnblogs.com/hongkejidan/p/10418835.html
             ROUTE -p add 172.20.0.0 mask 255.255.0.0 192.168.244.111

     3、多容器文件挂载路径需要注意。
          -v 注意路径参数

     4、mysql8连接，连接失败，因为加密方式有变化
     解决方式：主机登录mysql，修改成旧的加密方式（mysql_native_password），并重置密码 
     * docker exec -it mysql-002 /bin/bash
     * mysql -uroot -p;
     * use mysql;
     * alter user 'root'@'%' identified with mysql_native_password by '123456';    
、、、
