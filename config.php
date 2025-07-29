<?php
$host   = getenv('DB_HOST');
$db     = getenv('DB_DATABASE') ?: getenv('MYSQL_DATABASE');
$user   = getenv('DB_USER') ?: getenv('MYSQL_USER');
$pass   = getenv('DB_PASSWORD') ?: getenv('MYSQL_PASSWORD');
$port   = getenv('DB_PORT') ?: '3306';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
