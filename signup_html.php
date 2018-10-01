<?php  include("menu.php"); ?>
<!DOCTYPE html>
<html>
<body>

  <br/>
  <br/>
  <br/>
  <div class="sign_up_form">
    <h1>Sign up</h1>
    <form action="signup.php" method="post">
        Your name: <input type="text" name="name" value="" placeholder="Enter your name..."/>
        <br/>
        Login: <input type="text" name="login" value="" placeholder="Enter your login..."/>
        <br/>
        Email: <input type="text" name="email" value="" placeholder="Enter your email..."/>
        <br/>
        Telephone: <input type="text" name="telephone" value="" placeholder="Enter your telephone number..."/>
        <br/>
        Password: <input type="password" name="passwd" value="" placeholder="Enter your password here..."/>
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