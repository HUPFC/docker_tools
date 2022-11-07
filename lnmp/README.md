```
docker-compose up -d --force-recreate --build container_name  #独立重建和重启容器
docker rm $(docker ps -a -q) #删除所有未运行的容器
docker rmi $(docker images –qa) #删除所有镜像
docker exec -i nginx  nginx -s reload #nginx热加载
docker run  mysql:8 --name mysql8 -e MYSQL_ROOT_PASSWORD=123456 -p 3306:3306  #直接启动mysql 查看默认配置文件
```

```
php dockerfile额外编译的扩展
bcmath
event
exif
gd
mysqli
iconv
pcntl
pdo_mysql
redis
sockets
Zend OPcache
```