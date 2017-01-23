<?php
include "db_conn.php";
if (isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $row = $connection->query("SELECT name FROM file WHERE id='$id'");
    $row1 = $row->fetch_assoc();
    $dir = basename($row1['name']);
    echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=/upload/'.$dir.'">';
}
?>
<form action="" method="POST">
    <input type="number" name="id">
    <input type="submit" value="Распечатать"/>
</form>