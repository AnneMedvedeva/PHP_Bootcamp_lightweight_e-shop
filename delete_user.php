<?php 
session_start();
include('set_query.php');
del_user($_SESSION['login']);
session_unset();
header("Location: index.php",TRUE,301);
?>