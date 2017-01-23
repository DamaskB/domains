<?php
	$connection = new mysqli("192.168.1.33","root","","print");
	if (mysqli_connect_error()){
		echo "Ошибка соединения: " . mysqli_connect_error();
		exit();
	}
?>