<?php
	$connection = new mysqli("localhost","root","","rasp");
	// Проверка соединения
	if (mysqli_connect_error()){
		echo "Ошибка соединения: " . mysqli_connect_error();
		exit();
	}

$q1=$_POST['cabinet'];
$q2=$_POST['corpus'];
$q3=$_POST['teacher'];
$q4=$_POST['parity'];
$q5=$_POST['discipline'];
$q6=$_POST['group_id'];
$q7=$_POST['weekday'];
$q8=$_POST['number'];
echo $q1.' '.$q2.' '.$q3.' '.$q4.' '.$q5.' '.$q6.' '.$q7.' '.$q8;
$result = $connection->query("INSERT INTO raspis (cabinet,corpus,teacher,parity,discipline,group_id,weekday,number) VALUES ('$q1','$q2','$q3','$q4','$q5','$q6','$q7','$q8')");
$connection->close();
?>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=insert2.php"> 
