<?php

session_start();
$_SESSION['login']='';
$login = $_POST['login']; 
$pass = $_POST['pass'];

if($login and $pass){
	$params = array($login, $pass);

	$dbconn = pg_connect("host=localhost port=5431 dbname=postgres user=postgres password=admin");
	$query="SELECT * FROM users WHERE login=$1 AND password=$2";
	$result=pg_query_params($query, $params);

	if (pg_num_rows($result))
	{
		$_SESSION['login']=$login;
		$_SESSION['pass']=$pass;
		echo '<script> alert("Авторизация произведена!"); </script>';
	}
	else
	{
		echo '<script> alert("Не удалось авторизироваться!"); </script>';
		$login = '';
	}	
	pg_close($dbconn);
}

header("location:login.html");

exit;