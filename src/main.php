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

if($_SERVER['REQUEST_METHOD'] == "POST") {
  if(empty($_POST['post_content']) || empty($_POST['post_by'])) {
    $error = "Fill in both fields";
  } else {
    $post_content = mysqli_real_escape_string($connection, $_POST['post_content']);
    $post_by = mysqli_real_escape_string($connection, $_POST['post_by']);

    $sql = "INSERT INTO posts (post_content, post_by) VALUES (?,?)";

    $stmt = mysqli_prepare($connection, $sql);

    mysqli_stmt_bind_param($stmt, "ss", $post_content, $post_by);

    mysqli_stmt_execute($stmt);
  }
}

$sql = "SELECT * FROM posts ORDER BY post_date DESC";

$result = mysqli_query($connection, $sql);

$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);