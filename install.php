<?php 
$host = 'localhost';
$user = 'root';
$pass = 'admin123';
$db = 'online_store';

$connection = mysqli_connect ($host, $user, $pass);

if (!$connection)
{
	echo "Error connection\n";
	exit (mysqli_error());
}
if(!mysqli_select_db($connection, $db))
{
	mysqli_query($connection, "CREATE DATABASE online_store");
	exec("mysql -u $user --password=$pass $db < online_store.sql");
}

?>