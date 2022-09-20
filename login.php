<?php include 'functions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />
  <title>LOGIN</title>
  <link href="assets/css/cerulean-bootstrap.min.css" rel="stylesheet" />
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</head>

<body style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url(assets/gambar/background.jpg);
              background-size: cover;
              background-repeat: no-repeat;
              background-position: center center;
              width:100%;
              height:100vh;
              display: flex;
              align-items: center;
">
  <div class="container" >
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <form class="form-signin" action="?act=login" method="post" 
        style="background-color: orange;
              border-radius: 5px;
              padding-left: 5px;
              padding-right: 5px;
              padding-bottom: 5px;
        ">
          <center><h2 class="form-signin-heading" style="color:white;">Masuk</h2></center>
          <?php
          if ($_POST) {
            include 'aksi.php';
          }
          ?>
          <div class="form-group">
            <label for="inputEmail" class="sr-only">Username</label>
            <input type="text" id="inputEmail" class="form-control" placeholder="Username" name="user" autofocus />
          </div>
          <div class="form-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" />
          </div>
          <button class="btn btn-lg  btn-block" type="submit" 
          style="background-color: orangered; 
                 color:white;
          ">Masuk</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>