<?php require_once 'src/main.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">
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
      <?php if(!$posts): ?>
        <h3 id="notice">No Posts</h3>
      <?php else: ?>
        <?php foreach($posts as $post): ?>
          <div class="post">
            <p><?=$post['post_content']?></p>
            <span>By <?=$post['post_by']?> on <?=date('j F Y \a\t H:i', strtotime($post['post_date']))?></span>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
  <div class="footer">
    <p>&copy; <?=date('Y')?> Guestbook</p>
  </div>
</body>
</html>