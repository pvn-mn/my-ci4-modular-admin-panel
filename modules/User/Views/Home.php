<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="navbar-header">
      <a class="navbar-brand" href="#">MySystem</a>
    </div>

    <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= site_url('register') ?>"><span class="glyphicon glyphicon-user"></span> Register</a></li>
        <li><a href="<?= site_url('login') ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>

  </div>
</nav>

</body>
</html>