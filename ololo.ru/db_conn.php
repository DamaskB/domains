<?php
	$connection = new mysqli("192.168.1.33","root","","rasp");
	// Проверка соединения
	if (mysqli_connect_error()){
		echo "Ошибка соединения: " . mysqli_connect_error();
		exit();
	}
?>