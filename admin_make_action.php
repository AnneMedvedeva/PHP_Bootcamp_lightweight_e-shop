<?php
include('set_query.php');
include('admin_query.php');
print_r($_POST);
if ($_POST['action'])
{
	$action = $_POST['action'];

	switch ($action) {
		case 'add_user':
			if (add_user($_POST[login], $_POST[passwd], $_POST[name], $_POST[email], $_POST[phone], $_POST[admin])){
				header("Location: admin.php?action=user-modif",TRUE,301);
				exit();
			}
			else {
				session_start();
				$_SESSION['error'] = "<div class='error'><p>Error, login already in use</p></div>";
				header("Location: admin.php?action=users-add",TRUE,301);
				exit();
			}
			break;
		case 'del_user':
			if (del_user($_POST[login])){
				header("Location: admin.php?action=user-modif",TRUE,301);
				exit();
			}
			else {
				session_start();
				$_SESSION['error'] = "<div class='error'><p>Error, cant del user</p></div>";
				header("Location: admin.php?action=users-add",TRUE,301);
				exit();
			}
			break;
		case 'add_goods':
			if (add_item($_POST[name], $_POST[price], $_POST[img], $_POST[pcs])){
				header("Location: admin.php?action=goods-modif",TRUE,301);
				exit();
			}
			else {
				session_start();
				$_SESSION['error'] = "<div class='error'><p>Error, item already exist</p></div>";
				header("Location: admin.php?action=goods-add",TRUE,301);
				exit();
			}
			break;
		case 'del_item':
			if (del_item($_POST[id])){
				header("Location: admin.php?action=goods-modif",TRUE,301);
				exit();
			}
			else {
				session_start();
				$_SESSION['error'] = "<div class='error'><p>Error, cant del item</p></div>";
				header("Location: admin.php?action=goods-modif",TRUE,301);
				exit();
			}
			break;
		case 'add_categoty':
			if (add_category($_POST[name], $_POST[items], $_POST[img])){
				header("Location: admin.php?action=category-modif",TRUE,301);
				exit();
			}
			else {
				session_start();
				$_SESSION['error'] = "<div class='error'><p>Error, category already exist</p></div>";
				header("Location: admin.php?action=category-add",TRUE,301);
				exit();
			}
			break;
		case 'del_category':
			if (del_category($_POST[name])){
				header("Location: admin.php?action=category-modif",TRUE,301);
				exit();
			}
			else {
				session_start();
				$_SESSION['error'] = "<div class='error'><p>Error, cant del category</p></div>";
				header("Location: admin.php?action=category-modif",TRUE,301);
				exit();
			}
			break;
		case 'add_coalition':
			if (add_coalition($_POST[name], $_POST[items], $_POST[img])){
				header("Location: admin.php?action=coalition-modif",TRUE,301);
				exit();
			}
			else {
				session_start();
				$_SESSION['error'] = "<div class='error'><p>Error, coalition already exist</p></div>";
				header("Location: admin.php?action=coalition-add",TRUE,301);
				exit();
			}
			break;
		case 'del_coalition':
			if (del_coalition($_POST[name])){
				header("Location: admin.php?action=coalition-modif",TRUE,301);
				exit();
			}
			else {
				session_start();
				$_SESSION['error'] = "<div class='error'><p>Error, cant del coalition</p></div>";
				header("Location: admin.php?action=coalition-modif",TRUE,301);
				exit();
			}
			break;
		case 'modif_user':
			if (modif_user($_POST[login], $_POST[name], $_POST[email], $_POST[phone], $_POST[admin])){
				header("Location: admin.php?action=user-modif",TRUE,301);
				exit();
			}
			else {
				session_start();
				$_SESSION['error'] = "<div class='error'><p>Error, cant modif user</p></div>";
				header("Location: admin.php?action=user-modif",TRUE,301);
				exit();
			}
		case 'modif_item':
			if (modif_item($_POST[id], $_POST[name], $_POST[price], $_POST[img], $_POST[pcs])){
				header("Location: admin.php?action=goods-modif",TRUE,301);
				exit();
			}
			else {
				session_start();
				$_SESSION['error'] = "<div class='error'><p>Error, cant modif item</p></div>";
				header("Location: admin.php?action=goods-modif",TRUE,301);
				exit();
			}
		case 'modif_category':
			if (modif_category($_POST[id], $_POST[name], $_POST[items], $_POST[img])){
				header("Location: admin.php?action=category-modif",TRUE,301);
				exit();
			}
			else {
				session_start();
				$_SESSION['error'] = "<div class='error'><p>Error, cant modif category</p></div>";
				header("Location: admin.php?action=category-modif",TRUE,301);
				exit();
			}
		case 'modif_coalition':
			if (modif_coalition($_POST[id], $_POST[name], $_POST[items], $_POST[img])){
				header("Location: admin.php?action=coalition-modif",TRUE,301);
				exit();
			}
			else {
				session_start();
				$_SESSION['error'] = "<div class='error'><p>Error, cant modif coalition</p></div>";
				header("Location: admin.php?action=coalition-modif",TRUE,301);
				exit();
			}
		default:
			# code...
			break;
	}
}

?>