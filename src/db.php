<?php
ini_set('display_errors', 'on');

$host = '127.0.0.1';
$database = 'guestbook';
$user = '';
$password = '';
$charset = 'utf8mb4';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$connection = mysqli_connect($host, $user, $password, $database);

mysqli_set_charset($connection, $charset);