<?php 
session_start();
require_once 'config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Login</title>

    <link
      href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900"
      rel="stylesheet"
      type="text/css"
    />

    <link rel="stylesheet" href="css/animate.css" />
          <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/css/bootstrap.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="CSSgoldpawn.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  </head>
  <style>
    body {
      padding: 0;
      background: linear-gradient(120deg, #665151, white);
      height: 200vh;
      overflow: hidden;
      font-size: 16px;
      font-family: "Lato", sans-serif;
      font-weight: 300;
      margin: 0;
      color: #666;
    }

    h1#title {
      font-family: "Roboto Slab", serif;
      font-weight: 300;
      font-size: 3.2em;
      color: white;
      text-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
      margin: 0 auto;
      padding-top: 180px;
      max-width: 300px;
      text-align: center;
      position: relative;
      top: 0px;
    }

    h1#title span span {
      font-weight: 400;
    }

    h2 {
      text-transform: uppercase;
      color: white;
      font-weight: 400;
      letter-spacing: 1px;
      font-size: 1.4em;
      line-height: 2.8em;
    }

    a {
      text-decoration: none;
      color: #666;
    }

    a:hover {
      color: #aeaeae;
    }

    p.small {
      font-size: 0.8em;
      margin: 20px 0 0;
    }

    /* Layout */
    .container {
      margin: 0;
    }

    .top {
      margin: 0;
      padding: 0;
      width: 100%;
      background: -moz-linear-gradient(
        top,
        rgba(0, 0, 0, 0.6) 0%,
        rgba(0, 0, 0, 0) 100%
      ); /* FF3.6-15 */
      background: -webkit-linear-gradient(
        top,
        rgba(0, 0, 0, 0.6) 0%,
        rgba(0, 0, 0, 0) 100%
      ); /* Chrome10-25,Safari5.1-6 */
      background: linear-gradient(
        to bottom,
        rgba(0, 0, 0, 0.6) 0%,
        rgba(0, 0, 0, 0) 100%
      ); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#99000000', endColorstr='#00000000',GradientType=0 ); /* IE6-9 */
    }

    .login-box {
      background-color: white;
      max-width: 340px;
      margin: 0 auto;
      position: relative;
      top: 80px;
      padding-bottom: 30px;
      border-radius: 5px;
      box-shadow: 0 5px 50px rgba(0, 0, 0, 0.4);
      text-align: center;
    }

    .login-box .box-header {
      background-color: #665851;
      margin-top: 0;
      border-radius: 5px 5px 0 0;
    }

    .login-box label {
      font-weight: 700;
      font-size: 0.8em;
      color: #888;
      letter-spacing: 1px;
      text-transform: uppercase;
      line-height: 2em;
    }

    .login-box input {
      margin-bottom: 20px;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 2px;
      font-size: 0.9em;
      color: #888;
    }

    .login-box input:focus {
      outline: none;
      border-color: #665851;
      transition: 0.5s;
      color: #665851;
    }

    .login-box button {
      margin-top: 0px;
      border: 0;
      border-radius: 2px;
      color: white;
      padding: 10px;
      text-transform: uppercase;
      font-weight: 400;
      font-size: 0.7em;
      letter-spacing: 1px;
      background-color: #665851;
      cursor: pointer;
      outline: none;
    }

    .login-box button:hover {
      opacity: 0.7;
      transition: 0.5s;
    }

    .login-box button:hover {
      opacity: 0.7;
      transition: 0.5s;
    }

    .selected {
      color: #665851 !important;
      transition: 0.5s;
    }
    .bodybg {
  background-image: url('banner landing page.png');
}
   
  </style>
  <body>
    <div class="container d-flex justify-content-center">
      
            <div class="login-box animated fadeInUp ">
            <div class="box-header">
          <h2>Log In</h2>
        </div>
       
        <form action="signin_db.php" method="post">
            <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <div class="mb-3">
                <label for="email" class="form-label">Username</label>
                <input type="text"  name="email" aria-describedby="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password"  name="password">
            </div>
            <button type="submit" name="signin" class="btn btn-primary">Sign In</button>
        </form>
            
      </div>
    </div>
  </body>
</html>