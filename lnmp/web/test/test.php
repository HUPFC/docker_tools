<?php
std("redis test container");
$redis = new redis();
$redis->connect('redis',6379);
$pong = $redis->ping('ping');
std('ping result:'.$pong);


std("mysql test container");

$config = [
    'host'     => 'mysql',
    'user'     => 'obox_prod',
    'password' => 'nojhPPkZ',
    'database' => 'mysql',
    'charset'  => 'utf8',
];
$dsn    = sprintf(
    "mysql:host=%s;dbname=%s;charset=%s",
    $config['host'],
    $config['database'],
    $config['charset']
);

$pdo = new PDO($dsn, $config['user'], $config['password'], [ PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]);

$query = $pdo->query("SELECT version();");
print_r($query->fetchAll());


function std($str){
    $pre = date('Y-m-d H:i:s');
    echo "[$pre] $str <br>";
}