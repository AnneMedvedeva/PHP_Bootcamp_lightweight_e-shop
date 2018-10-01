<?php

function add_user($login, $passwd, $name, $email, $phone, $admin)
{
	include ('db.php');

	$passwd = hash("whirlpool", $passwd);
	$query = mysqli_query($connection, "INSERT INTO users (login, passwd, name, email, phone, admin) VALUES ('$login', '$passwd', '$name', '$email', '$phone', '$admin')");
	if (!$query) {
		return false;
	}
	else {
		return true;
	}
}

function del_user($login)
{
	include ('db.php');

	if (mysqli_query($connection, "DELETE FROM users WHERE login = '$login'"))
		return true;
	else
		return false;
}

function set_order($id_user, $ids_items, $coalition_ids, $pcs, $sum)
{
	include ('db.php');
	$items = serialize($ids_items);
	$coalition = serialize($coalition_ids);
	$pcs_ser = serialize($pcs);
	if (!mysqli_query($connection, "INSERT INTO orders (id_user, items, coalition, pcs, sum) VALUES ('$id_user', '$items', '$coalition', '$pcs_ser', '$sum')")) {

		return false;
	}
	else {
		return true;
	}
}

?>