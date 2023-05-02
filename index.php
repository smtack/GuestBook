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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>Guestbook</title>
</head>
<body>
  <div class="header">
    <h1>Guestbook</h1>
  </div>
  <div class="content">
    <div class="submit">
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
          <?=isset($error) ? '<p id="error">' . $error . '</p>' : ''?>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="post_content"></textarea>
        </div>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="post_by">
        </div>
        <div class="form-group">
          <input type="submit" name="submit" value="Post">
        </div>
      </form>
    </div>
    <div class="posts">
      <?php foreach($posts as $post): ?>
        <div class="post">
          <p><?=$post['post_content']?></p>
          <span>By <?=$post['post_by']?> on <?=date('j F Y \a\t H:i', strtotime($post['post_date']))?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="footer">
    <p>&copy; <?=date('Y')?> Guestbook</p>
  </div>
</body>
</html>