<?php
$db = new PDO('mysql:host=mariadb;dbname=simondb', 'user', 'password');

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
