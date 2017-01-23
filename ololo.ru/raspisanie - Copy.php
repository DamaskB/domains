<STYLE type="text/css">
  <!--
  	*{
  		list-style-type: none;  		
     	font-family:Arial,sans-serif;
    	 text-align:center;
    	 width: 200px;
    	 margin: 0;
    	 padding: 0;
  	}
  	div{
  		background: red;
  	}
    li{
     color:blue;
     height: 25px;
     background: yellow;
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
	echo '<div class="today">Сегодня '.daydes($day).' ('.$paritydes.')<ul>';
	$result1 = $connection->query("SELECT * FROM raspis WHERE group_id = '$sel' AND weekday = '$day' AND (parity = '0' OR parity = '$parity') ORDER BY 'number'");
	if ($result2->num_rows==0) {
			echo '<li class="linum0">Нет пар</li>';
		} else{
	while($row=$result1->fetch_assoc()){
		if ($row['corpus']==8){
		echo '<li class="linum'.$row['number'].'">'.$row['discipline'].'</li>';
		}else{
		echo '<li class="linum'.$row['number'].'">'.$row['discipline'].' '.$row['cabinet'].'/'.$row['corpus'].'к</li>';}}}
	echo '</ul></div>';

	for ($i=1; $i <= 6 ; $i++) { 
		
		echo '<div class="dayn">'.daydes($i).'<ul>';
		$result2 = $connection->query("SELECT * FROM raspis WHERE group_id = '$sel' AND weekday = '$i' AND (parity = '0' OR parity = '$parity') ORDER BY 'number'");
		if ($result2->num_rows==0) {
			echo '<li class="linum0">Нет пар</li>';
		} else{
		while($row=$result2->fetch_assoc()){
		if ($row['corpus']==8){
		echo '<li class="linum'.$row['number'].'">'.$row['discipline'].'</li>';
		}else{
		echo '<li class="linum'.$row['number'].'">'.$row['discipline'].' '.$row['cabinet'].'/'.$row['corpus'].'к</li>';}}}
		echo '</ul></div>';
	}





	$connection->close();
?>
