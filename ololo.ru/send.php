<?php
	$connection = new mysqli("localhost","root","","rasp");
	// Проверка соединения
	if (mysqli_connect_error()){
		echo "Ошибка соединения: " . mysqli_connect_error();
		exit();
	}
	echo "Подключение успешно! " . $connection->host_info;

$q1=$_POST['name'];
$q2=$_POST['course'];
$q3=$_POST['number'];
$result = $connection->query("INSERT INTO groups (name,course,number) VALUES ('$q1','$q2','$q3')");
$connection->close();
?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=insert.php"> 