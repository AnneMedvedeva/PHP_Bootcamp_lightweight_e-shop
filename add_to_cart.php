<?php

if($_GET[id])
{
	$id = $_GET[id];
	session_start();
	$cart = array();
	if($_SESSION[cart]){
		$cart = unserialize($_SESSION[cart]);
		if($cart[$id]){
			$cart[$id] += 1;
		}
		else{
			$cart[$id] = 1;
		}
	}
	else{
		$cart[$id] = 1;
	}
	$_SESSION[cart] = serialize($cart);
	$_SESSION[error] = 1;
	header("Location: item.php?id=$id",TRUE,301);
}
?>