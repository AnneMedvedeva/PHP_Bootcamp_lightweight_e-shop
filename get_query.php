<?php

function get_category_items($category)
{
	include ('db.php');
	
	$query = mysqli_query($connection, "SELECT * FROM category WHERE name = '$category'");
	$row = mysqli_fetch_assoc($query);
	$items_id = unserialize($row['items']);
	return $items_id;
}

function get_all_items()
{
	include ('db.php');
	
	$ret = array();
	$query = mysqli_query($connection, "SELECT * FROM goods");
	while (($row = mysqli_fetch_assoc($query))) {
		$ret[] = $row;
	}
	return $ret;
}

function get_all_users()
{
	include ('db.php');
	
	$ret = array();
	$query = mysqli_query($connection, "SELECT * FROM users");
	while (($row = mysqli_fetch_assoc($query))) {
		$ret[] = $row;
	}
	return $ret;
}

function get_all_category()
{
	include ('db.php');
	
	$ret = array();
	$query = mysqli_query($connection, "SELECT * FROM category");
	while (($row = mysqli_fetch_assoc($query))) {
		$ret[] = $row;
	}
	return $ret;
}

function get_all_coalitions()
{
	include ('db.php');
	
	$ret = array();
	$query = mysqli_query($connection, "SELECT * FROM coalitions");
	while (($row = mysqli_fetch_assoc($query))) {
		$ret[] = $row;
	}
	return $ret;
}

function get_items_array($items_id)
{
	include ('db.php');

	$arr_items = array();
	foreach ($items_id as $value) {
		$query = mysqli_query($connection, "SELECT * FROM goods WHERE id = '$value'");
		$row = mysqli_fetch_assoc($query);
		$arr_items[] = $row;
	}
	return $arr_items;
}

function get_catigories_name()
{
	include ('db.php');

	$res = array();
	$query = mysqli_query($connection, "SELECT name FROM category WHERE 1 ORDER BY id");
	while ($row = mysqli_fetch_assoc($query)) {
		$res[] = $row['name'];
	}
	return $res;
}

function get_user_info($login)
{
	include ('db.php');

	$query = mysqli_query($connection, "SELECT * FROM users WHERE login = '$login'");
	$row = mysqli_fetch_assoc($query);

	return $row;
}

function get_item($id)
{
	include ('db.php');

	$query = mysqli_query($connection, "SELECT * FROM goods WHERE id = '$id'");
	$row = mysqli_fetch_assoc($query);

	return $row;
}

function get_coalitions($ids)
{
	include ('db.php');

	$ret = array();
	foreach ($ids as $value) {
		$query = mysqli_query($connection, "SELECT * FROM coalitions WHERE id = '$value'");
		$row = mysqli_fetch_assoc($query);
		$ret[] = $row;
	}

	return $ret;
}

function login_user($login, $passwd)
{	
	include ('db.php');
	$passwd = hash("whirlpool", $passwd);
	$query = mysqli_query($connection, "SELECT admin FROM users WHERE login = '$login' AND passwd = '$passwd'");
	if ($query) {
		$row = mysqli_fetch_assoc($query);
		return $row;
	}
	else {
		return NULL;
	}

}
?>