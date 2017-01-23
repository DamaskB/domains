<STYLE type="text/css">
  <!--
  	*{
  		list-style-type: none;  		
     	font-family:Arial,sans-serif;
    	 text-align:center;
    	 font-size: 36px;
    	 width: 100%;
    	 margin: 0;
    	 padding: 0;
  	}
  	tr.linum0 td{
  		width: 100%;
  	}
  	tr:nth-child(even){
  		background: #ccc;
  	}
    td:first-child{
    	width: 10%;
    }
    td:nth-child(2){
    	width: 60%;
    }
    td:nth-child(4){
    }
    table{
    	border-collapse: collapse;
    }
    td,th{
    	border: 1px solid;
    }
    caption{
    	background: blue;
    	color: white;
    }
  -->
  </STYLE>
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
				$daydes= "8:20<br>9:50";
				break;
			case '2':
				$daydes= "10:00<br>11:30";
				break;
			case '3':
				$daydes= "12:10<br>13:40";
				break;
			case '4':
				$daydes= "13:50<br>15:20";
				break;
			case '5':
				$daydes= "15:50<br>17:20";
				break;
			case '6':
				$daydes= "17:30<br>19:00";
				break;
			case '7':
				$daydes= "19:30<br>21:00";
				break;
		}
		return $daydes;
	}
	include "db_conn.php";
	$sel=$_POST['sel'];
	$day=date(N);
	if ((date(W) % 2) == 0) {
		$parity = 2;
		$paritydes = 'Знаменатель';
	} else{
		$parity =1;
		$paritydes = 'Числитель';
	}

	$numm=$connection->query("SELECT number FROM groups WHERE id = '$sel'")->fetch_assoc();
	echo $numm['number'];
	echo '<table><caption>Сегодня '.daydes($day).'<br>('.$paritydes.')</caption>';	$result1 = $connection->query("SELECT * FROM raspis WHERE group_id = '$sel' AND weekday = '$day' AND (parity = '0' OR parity = '$parity') ORDER BY 'number'");
	if ($result1->num_rows==0) {
			echo '<tr class="linum0"><td>Нет пар</td></tr>';
		} else{
	while($row=$result1->fetch_assoc()){
		if ($row['corpus']==8){
		echo '<tr class="linum'.$row['number'].'"><td>'.$row['number'].'</td><td>'.$row['discipline'].'</td></tr>';
		}else{
		echo '<tr class="linum'.$row['number'].'"><td>'.$row['number'].'</td><td>'.$row['discipline'].'</td><td>'.$row['teacher'].'</td><td>'.$row['cabinet'].'/'.$row['corpus'].'к</td></tr>';}}}
	echo '</table></div>';

	for ($i=1; $i <= 6 ; $i++) { 
		echo '<table><caption>'.daydes($i).'</caption>';
		$result2 = $connection->query("SELECT * FROM raspis WHERE group_id = '$sel' AND weekday = '$i' AND (parity = '0' OR parity = '$parity') ORDER BY 'number'");
		if ($result2->num_rows==0) {
			echo '<tr class="linum0"><td>Нет пар</td></tr>';
		} else{
	while($row=$result2->fetch_assoc()){
		if ($row['corpus']==8){
		echo '<tr class="linum"><td>'.ltime($row['number']).'</td><td>'.$row['discipline'].'</td></tr>';
		}else{
		echo '<tr class="linum"><td>'.ltime($row['number']).'</td><td>'.$row['discipline'].'</td><td>'.$row['teacher'].'</td><td>'.$row['cabinet'].'/'.$row['corpus'].'к</td></tr>';}}}
	echo '</table></div>';
	}





	$connection->close();
?>
