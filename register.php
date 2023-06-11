<?php
	
session_start();
	
$login = $_POST['login']; 
$pass = $_POST['pass'];


if($login and $pass)
{
	$dbconn = pg_connect("host=localhost port=5431 dbname=postgres user=postgres password=admin");
	$query = "INSERT INTO users (login, password) VALUES ('$login', '$pass')";
	$result = pg_query($query);
	echo '<script> alert("Пользователь успешно загеристрирован!"); </script>';
}

exit;

?>
