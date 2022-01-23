<?php 

$pdo = new PDO('mysql:host=mariadb;dbname=simondb', 'user', 'password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $pdo;





