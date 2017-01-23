﻿<STYLE type="text/css">
	<!--
	*{
		font-family:Arial,sans-serif;
		text-align:center;
		font-size: 30px;
		margin: 0;
		padding: 0;
	}
	body{
		background-image: url(ds.jpg);
	}
	div{
		width: 80%;
		margin-left: 10%;
		background: white;
		text-align: center;
		opacity: 0.9;
		z-index: -2;
	}
	table{
		min-width: 100%;
		border-radius: 10px;
	}
	tr.linum{
		margin-top: 30px;
	}

	caption{
		margin-bottom: 30px;
		margin-top: 30px;
		line-height: 50px;
		background-image: url(2.png);
	}
	tr.linum td:first-child{
		width: 25%;
		text-align: left;
		vertical-align: 0;
		position: absolute;
		padding-left: 6px;
		font-weight: 600;
	}
	tr.linum td:nth-child(2){
		padding-left: 230px;
	}
	tr.linum:before{
		content: '';
		background-image: url(1.png);
		opacity: 0.8;
		height: 60px;
		width: 220px;
		margin-top:-5px;
		margin-left: -20px;
		position: absolute;
	}
	span{
		color: transparent;
	}
	-->
</STYLE>
<body>
<div>
	<?php
	function daydes($i){
		switch ($i) {
			case '1':
				$daydes= "Понедельник";
				break;
			case '2':
				$daydes= "Вторник";
				break;
			case '3':
				$daydes= "Среда";
				break;
			case '4':
				$daydes= "Четверг";
				break;
			case '5':
				$daydes= "Пятница";
				break;
			case '6':
				$daydes= "Суббота";
				break;
			case '7':
				$daydes= "Воскресенье";
				break;
		}
		return $daydes;
	}
	function ltime($i){
		switch ($i) {
			case '1':
				$daydes= "8:20 - 9:50";
				break;
			case '2':
				$daydes= "10:00 - 11:30";
				break;
			case '3':
				$daydes= "12:10 - 13:40";
				break;
			case '4':
				$daydes= "13:50 - 15:20";
				break;
			case '5':
				$daydes= "15:50 - 17:20";
				break;
			case '6':
				$daydes= "17:30 - 19:00";
				break;
			case '7':
				$daydes= "19:30 - 21:00";
				break;
		}
		return $daydes;
	}
	include "db_conn.php";
	$sel=$_GET['id'];
	$day=date(N);
	if ((date(W) % 2) == 0) {
		$parity = 2;
		$paritydes = 'Знаменатель';
	} else{
		$parity =1;
		$paritydes = 'Числитель';
	}

	$numm=$connection->query("SELECT number FROM groups WHERE id = '$sel'")->fetch_assoc();
	echo '<title>'.$numm['number'].'</title><h2>'.$numm['number'].'</h2>';
	echo '<table><caption>Сегодня '.daydes($day).' ('.$paritydes.')</caption>';	$result1 = $connection->query("SELECT * FROM raspis WHERE group_id = '$sel' AND weekday = '$day' AND (parity = '0' OR parity = '$parity') ORDER BY 'number'");
	if ($result1->num_rows==0) {
		echo '<tr class="linum0"><td>Нет пар</td></tr>';
	}
	else{
		while($row=$result1->fetch_assoc()){
			if ($row['corpus']==8 OR $row['corpus']==0){
				echo '<tr class="linum"><td>'.ltime($row['number']).'</td><td>'.$row['discipline'].'<br><b>Индивидуально</b><br><span>aaa</span></td></tr>';
			}
			else{
				echo '<tr class="linum"><td>'.ltime($row['number']).'</td><td>'.$row['discipline'].'<br><b>'.$row['cabinet'].'/'.$row['corpus'].'к</b><br>'.$row['teacher'].'<br><span>aaa</span></td></tr>';
			}
		}
	}
	echo '</table>';

	for ($i=1; $i <= 6 ; $i++) {
		echo '<table><caption>'.daydes($i).'</caption>';
		$result2 = $connection->query("SELECT * FROM raspis WHERE group_id = '$sel' AND weekday = '$i' AND (parity = '0' OR parity = '$parity') ORDER BY 'number'");
		if ($result2->num_rows==0) {
			echo '<tr class="linum0"><td>Нет пар</td></tr>';
		}
		else{
			while($row=$result2->fetch_assoc()){
				if ($row['corpus']==8 OR $row['corpus']==0){
					echo '<tr class="linum"><td>'.ltime($row['number']).'</td><td>'.$row['discipline'].'<br><b>Индивидуально</b><br><span>aaa</span></td></tr>';
				}
				else{
					echo '<tr class="linum"><td>'.ltime($row['number']).'</td><td>'.$row['discipline'].'<br><b>'.$row['cabinet'].'/'.$row['corpus'].'к</b><br>'.$row['teacher'].'<br><span>aaa</span></td></tr>';
				}
			}
		}
		echo '</table>';
	}
	$connection->close();
	?>
</div>
</body>