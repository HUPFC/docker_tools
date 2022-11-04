```angular2html
docker-compose up -d --force-recreate --build container_name  #独立重建和重启容器
docker rm $(docker ps -a -q) #删除所有未运行的容器
docker rmi $(docker images –qa) #删除所有镜像
```