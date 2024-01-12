<?php require_once 'src/db.php'; ?>

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

    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js" defer></script>
    
    <title>Guestbook</title>
</head>
<body>
  <div class="header">
    <h1>Guestbook</h1>
  </div>

  <div class="content">
    <div class="submit">
      <form id="form">
        <div class="form-group errormsg">
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message"></textarea>
        </div>
        <div class="form-group">
          <label for="name">Name</label>
          <input id="name" name="name" type="text">
        </div>
        <div class="form-group">
          <input id="submit" name="submit" type="submit" value="Post">
        </div>
      </form>
    </div>
    
    <div class="posts">
    </div>
  </div>

  <div class="footer">
    <p>&copy; <?=date('Y')?> Guestbook</p>
  </div>
</body>
</html>