<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <title>Info Board</title>
</head>
<body>
  <header>
    <div id="site-logo">Tablica ogłoszeń</div>
    <nav id="main-navigation">
      <ul>
        <li><a href="index.php?controller=user&action=index">Użytkownicy</a></li>
        <li><a href="index.php?controller=notice&action=index">Ogłoszenia</a></li>
        <li><a href="index.php?controller=noticeType&action=index">Typ ogłoszenia</a></li>
      </ul>
    </nav>
    <div id="login-logout">
      <?php if ($this->loggedUser) {?>
      <a href="index.php?controller=user&action=logout">Logout</a>
      <?php } else { ?>
      <a href="index.php?controller=user&action=login">Login</a>
      <?php } ?>
    </div>
  </header>
  <?php echo $this->loggedUser['username']; ?>
  <main>
    <?php $this->renderPage(); ?>
  </main>

  <script type=”text/javascript” src="js/jquery-1.11.1.min.js"></script>
  <script type=”text/javascript” src="js/bootstrap.js"></script>
  <script src="http://localhost/livereload.js"></script>
</body>
</html>
