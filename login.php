<?php
  session_start();
  include('get_query.php');
  if (empty($_POST['login']) || empty($_POST['passwd']) || $_POST['submit'] != 'OK')
  {
    $_SESSION['error'] = "<div class='error'><p>Error, wrong login/password</p></div>";
    header("Location: login_html.php",TRUE,301);
    exit();
  }
  else
  {
    $res = login_user($_POST['login'], $_POST['passwd']);
    if($res != NULL)
    {
      $_SESSION['login'] = $_POST['login'];
      if($res[admin])
      {
        $_SESSION['admin'] = 1;
        header("Location: index.php",TRUE,301);
        exit();
      }
      else
      {
        header("Location: index.php",TRUE,301);
        exit();
      }
    }
    else{
      $_SESSION['error'] = "<div class='error'><p>Error</p></div>";
      header("Location: login_html.php",TRUE,301);
      exit();
    }
  }
?>