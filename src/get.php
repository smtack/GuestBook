<?php
require_once 'db.php';

$sql = "SELECT * FROM posts ORDER BY post_date DESC";

$result = mysqli_query($connection, $sql);

$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach($posts as $post) {
  echo("
    <div class='post'>
      <p>" . $post['post_content'] . "</p>
      <span>By " . $post['post_by'] . " on " . date('j F Y \a\t H:i', strtotime($post['post_date'])) . "</span>
    </div>
  ");
}