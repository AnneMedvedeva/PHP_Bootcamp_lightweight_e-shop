<?php
session_start();
include('set_query.php');
include('get_query.php');
if($_SESSION['login'] && $_SESSION['cart'])
{
	$cart = unserialize($_SESSION[cart]);
	$sum = 0;
	$items = array();
	$total = array();
	foreach($cart as $key=>$value){
		$item = get_item($key);
		$items[] = $item[id];
	    $sum += $item[price] * $value;
       	$total[] = $value;
    }
	$user = get_user_info($_SESSION['login']);
	$user_id = $user[id];
	$ret = set_order($user_id, $items, 0, $total, $sum);
	if($ret){
		header("Location: cart.php",TRUE,301);
		$_SESSION['error'] = 2;
		$_SESSION['cart'] = 0;
		exit();
	}
	else{
		header("Location: cart.php",TRUE,301);
		$_SESSION['error'] = 3;
		$_SESSION['cart'] = 0;
		exit();
	}
}
else{
	if($_SESSION[login]){
		$_SESSION['error'] = 4;
	}
	else{
		$_SESSION['error'] = 1;
	}
	header("Location: cart.php",TRUE,301);
    exit();
}
?>