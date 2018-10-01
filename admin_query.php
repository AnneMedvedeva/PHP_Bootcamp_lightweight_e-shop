<?php

function get_rows($table)
{
	include('db.php');

	$res = array();
	$query = mysqli_query($connection, "SHOW FIELDS FROM $table");
	while (($row = mysqli_fetch_assoc($query))) {
		$res[] = $row['Field'];
	}
	return $res;
}

function add_item($name, $price, $img, $pcs)
{
	include('db.php');

	$query = mysqli_query($connection, "INSERT INTO goods (name, price, img, pcs) VALUES ('$name', '$price', '$img', '$pcs')");
	if ($query) {
		return true;
	}
	else {
		return false;
	}
}

function add_category($name, $items, $img)
{
	include('db.php');

	$items = preg_split("/[,]+/", trim($items), -1, PREG_SPLIT_NO_EMPTY);
	$items = serialize($items);
	$query = mysqli_query($connection, "INSERT INTO category (name, items, img) VALUES ('$name', '$items', '$img')");
	if ($query) {
		return true;
	}
	else {
		return false;
	}
}

function add_coalition($name, $items, $img)
{
	include('db.php');

	$items = preg_split("/[,]+/", trim($items), -1, PREG_SPLIT_NO_EMPTY);
	$items = serialize($items);
	$query = mysqli_query($connection, "INSERT INTO coalitions (name, items, img) VALUES ('$name', '$items', '$img')");
	if ($query) {
		return true;
	}
	else {
		return false;
	}
}

function del_category($name)
{
	include('db.php');

	$query = mysqli_query($connection, "DELETE FROM category WHERE name = '$name'");
	if ($query) {
		return true;
	}
	else {
		return false;
	}
}

function del_item($id)
{
	include('db.php');

	$query = mysqli_query($connection, "DELETE FROM goods WHERE id = '$id'");
	if ($query) {
		return true;
	}
	else {
		return false;
	}
}

function del_coalition($name)
{
	include('db.php');

	$query = mysqli_query($connection, "DELETE FROM coalitions WHERE name = '$name'");
	if ($query) {
		return true;
	}
	else {
		return false;
	}
}

function modif_user($login, $name, $email, $phone, $admin) {
	include('db.php');

	$query = mysqli_query($connection, "UPDATE users SET name = '$name', email = '$email', phone = '$phone', admin = $admin WHERE login = '$login'");
	if ($query) {
		return true;
	}
	else {
		return false;
	}
}

function modif_item($id, $name, $price, $img, $pcs) {
	include('db.php');

	$query = mysqli_query($connection, "UPDATE goods SET name = '$name', price = '$price', img = '$img', pcs = $pcs WHERE id = $id");
	if ($query) {
		return true;
	}
	else {
		return false;
	}
}

function modif_category($id, $name, $items, $img) {
	include('db.php');

	$items = preg_split("/[,]+/", trim($items), -1, PREG_SPLIT_NO_EMPTY);
	$items = serialize($items);
	$query = mysqli_query($connection, "UPDATE category SET name = '$name', items = '$items', img = '$img' WHERE id = $id");
	if ($query) {
		return true;
	}
	else {
		return false;
	}
}

function modif_coalition($id, $name, $items, $img) {
	include('db.php');

	$items = preg_split("/[,]+/", trim($items), -1, PREG_SPLIT_NO_EMPTY);
	$items = serialize($items);
	$query = mysqli_query($connection, "UPDATE coalitions SET name = '$name', items = '$items', img = '$img' WHERE id = $id");
	if ($query) {
		return true;
	}
	else {
		return false;
	}
}

function get_all_orders()
{
	include ('db.php');
	
	$ret = array();
	$query = mysqli_query($connection, "SELECT * FROM orders");
	while (($row = mysqli_fetch_assoc($query))) {
		$ret[] = $row;
	}
	return $ret;
}

?>