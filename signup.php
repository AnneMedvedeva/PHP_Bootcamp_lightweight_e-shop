<?php
session_start();
include('set_query.php');
if(empty($_POST[name]) || empty($_POST[login]) || empty($_POST[email]) || empty($_POST[telephone]) || empty($_POST[passwd]) || $_POST[submit] != 'OK') {
	$_SESSION['error'] = "<div class='error'><p>Error, wrong login/password</p></div>";
    header("Location: signup_html.php",TRUE,301);
    exit();
}
else {
	$res = add_user($_POST[login], $_POST[passwd], $_POST[name], $_POST[email], $_POST[telephone], 0);
	if ($res == true) {
		$_SESSION[login] = $_POST[login];
		header("Location: index.php",TRUE,301);
		exit();
	}
	else {
		$_SESSION['error'] = "<div class='error'><p>Error, login already in use</p></div>";
      	header("Location: signup_html.php",TRUE,301);
      	exit();
	}
}

?>