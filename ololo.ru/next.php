<STYLE type="text/css">
    <!--
    * {
        color: red;
        font-family: Arial, sans-serif;
        text-align: center;
        font-size: 60px;
    }

    -->
</STYLE>
<?php
$faculty = preg_replace('/[^\p{L}\p{Zs}]/u', '', $_POST['faculty']);
$name = preg_replace('/[^\p{L}\p{Zs}]/u', '', $_POST['name']);
$course = (int)$_POST['course'];
include "db_conn.php";
$row = $connection->query("SELECT id FROM groups WHERE faculty='$faculty' AND name='$name' AND course='$course'")->fetch_assoc();
$id = $row['id'];
$row2 = $connection->query("SELECT id FROM raspis WHERE group_id='$id'");
if ($row == '') {
    echo 'Группа с такими параметрами не найдена!';
} elseif (($row2->num_rows) == 0) {
    echo 'Нет расписания для этой группы!';
} else {
    echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=oop_raspisanie.php?id=' . $id . '">';
}
$connection->close();
?>