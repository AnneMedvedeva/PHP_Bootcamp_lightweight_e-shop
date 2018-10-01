<?php  include("menu.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="stock_style.css">
</head>
<body>
  <br/>
  <br/>
  <br/>
<div>
      <?php
        session_start();
        include('get_query.php');
        if ($_SESSION['login'])
        {
            echo "<div class='info'>";
            echo $_SESSION['login'];
            echo "'s user information";
            echo "<p>Name:";
            $res = get_user_info($_SESSION['login']);
            echo $res['name'];
            echo "</p><p>Email:";
            echo $res['email'];
            echo "</p><p>Contact phone:";
            echo $res['phone'];
            echo "</p></div>";
            echo "<br/>";
            echo "<a href='delete_user.php'><div class='button'>Delete my account</div></a>";
        }
        else
        {
          echo"<div class='error'><p>Error, you're not logged in</p></div>";
        }
    ?>
</div>

</body>
</html>