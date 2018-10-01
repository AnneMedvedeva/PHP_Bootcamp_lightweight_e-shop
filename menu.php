<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="stock_style.css">
</head>
<body>

<div class = "header_image"></div>
<div id="menu">
    <ul>
      <li><a href="index.php">Main</a></li>
    <?php
        session_start();
        include("db.php");
        if ($_SESSION['login'])
        {
            echo"<li><a href='info.php'>My info</a></li>";
            echo"<li><a href='logout.php'>Logout</a></li>";
        }
        else
        {
            echo"<li><a href='signup_html.php'>Signup</a></li>";
            echo"<li><a href='login_html.php'>Login</a></li>";
        }
    ?>
    <li><a href="cart.php">Cart</a></li>
    <?php
        session_start();
        if ($_SESSION['admin'] == 1)
        {
            echo"<li><a href='admin.php'>Admin</a></li>";
        }
    ?>
    </ul>
  </div>

</body>
</html>