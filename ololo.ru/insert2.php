<?php
	include "db_conn.php";
?>
<form method="POST" action="send2.php">
	<p>Кабинет <input type="text" name="cabinet"/></p>
	<p>Корпус <select name="corpus">
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		<option value="6">6</option>
		<option value="7">7</option>
		<option value="8">Другой</option>
	</select></p>
	<p>Преподователь <input type="text" name="teacher"/></p>
	<p>Четность <select name="parity">
		<option value="0">Всегда</option>
		<option value="1">Числитель</option>
		<option value="2">Знаменатель</option>
	</select></p>
	<p>Предмет <input type="text" name="discipline"/></p>
	<p>Группа <select name="group_id">
		<?php
		$result = $connection->query("SELECT * FROM groups");
		while($row=$result->fetch_assoc()){
		echo '<option value="'.$row['id'].'">'.$row['name'].' '.$row['course'].' курс '.$row['number'].'</option>';}
		$connection->close();
		?>
	</select></p>
	<p>День недели <select name="weekday">
		<option value="1">Понедельник</option>
		<option value="2">Вторник</option>
		<option value="3">Среда</option>
		<option value="4">Четверг</option>
		<option value="5">Пятница</option>
		<option value="6">Суббота</option>
	</select></p>
	<p>Время <select name="number">
		<option value="1">8:20 - 9:50</option>
		<option value="2">10:00 - 11:30</option>
		<option value="3">12:10 - 13:40</option>
		<option value="4">13:50 - 15:20</option>
		<option value="5">15:50 - 17:20</option>
		<option value="6">17:30 - 19:00</option>
		<option value="7">19:30 - 21:00</option>
	</select></p>
	<p><input type="submit" value="Отправить" /></p>
</form>

