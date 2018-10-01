<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="stock_style.css">
</head>
<body>

<div class = "header_image"></div>
<div id="menu">
    <ul>
      <li><a href="index.php">Back to Main Menu</a></li>
    </ul>
</div>
  <br/>
  <br/>
  <br/>
  <div class="sign_up_form">
    <h1>Log in</h1>
    <form action="login.php" method="POST">
    Login: <input type="text" name="login" value="" placeholder="Enter your login..."/>
    <br/>
    Password: <input type="password" name="passwd" value="" placeholder="Enter your password..."/>
    <input type="submit" name="submit" value="OK"></input>
    </form>
  </div>
<?php
  session_start();
  if($_SESSION['error']){
      echo $_SESSION['error'];
      $_SESSION['error'] = "";
  }
?>
</div>

</body>
</html>