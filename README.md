# laravel-hprose

## 1.命令工具

## 1.1 php artisan make:rpc


>创建rpc服务器端controller文件

## 1.2 php artisan make:rpcp

> 创建paramter参数验证文件

## 1.3 php artisan hprose:server

> 启动socket服务命令

## 1.4 php artisan hprose:http_server

> 启动swoole http服务命令



## 2配置说明

## 2.1.env参数说明

|参数|说明|默认值|
|--|--|--|
|ENABLE_SOCKET_SERVER|是否开启socket服务|true开启|
|ENABLE_SWOOLE_HTTP_SERVER|是否开启swoole http服务|true开启|
|HPROSE_TCP_URIS|tcp监听端口列表|["tcp://0.0.0.0:1314"]|
|HPROSE_HTTP_URI|http域名| http://0.0.0.0:8086 |


```
ENABLE_SOCKET_SERVER=true|false 
ENABLE_SWOOLE_HTTP_SERVER=true|false 
HPROSE_TCP_URIS=["tcp://0.0.0.0:1314","tcp://0.0.0.0:1888"]
HPROSE_HTTP_URI=http://0.0.0.0:8088
```

