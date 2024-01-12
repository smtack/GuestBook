<?php
require_once 'db.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
  if(!empty($_POST['message']) || !empty($_POST['name'])) {
    $post_content = mysqli_real_escape_string($connection, $_POST['message']);
    $post_by = mysqli_real_escape_string($connection, $_POST['name']);

    $sql = "INSERT INTO posts (post_content, post_by) VALUES (?,?)";

    $stmt = mysqli_prepare($connection, $sql);

    mysqli_stmt_bind_param($stmt, "ss", $post_content, $post_by);

    mysqli_stmt_execute($stmt);
  }
}