<?php

session_start();

$login = $_SESSION['login'];
$pass = $_SESSION['pass'];

$surname = $_POST['surname']; 
$name = $_POST['name'];
$subject = $_POST['subject'];
$time = $_POST['time'];
$form = $_POST['form'];
$comm = $_POST['comment'];


$dbconn = pg_connect("host=localhost port=5431 dbname=postgres user=postgres password=admin");

$user_id;
if($login and $pass)
{
	$logINparams = array($login, $pass);
	$findIDq="SELECT id FROM users WHERE login=$1 AND password=$2";
	$result=pg_query_params($findIDq, $logINparams);
	$user_id = pg_fetch_result($result, 0, 0);
}
	$forms = implode(", ",$form);
	$comment = strval($comm);
	$params = array($surname, $name, $subject, $time, $forms);
	$string_param = strval(implode(", ",$params));
	echo $string_param;
	
	if($comment)
		$query="INSERT INTO members (user_id, text, comment) VALUES ('$user_id', '$string_param', '$comment')";
	else
		$query="INSERT INTO members (user_id, text, comment) VALUES ('$user_id', '$string_param', '')";
	
	
	$send=pg_query($query);

	if ($send)
	{
		echo '<script> alert("Данные отправлены"); </script>';
	}

header("location:/");
exit;

