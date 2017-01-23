<?php
/**
 * Created by PhpStorm.
 * User: BULAT
 * Date: 1/13/2017
 * Time: 6:46 PM
 */
include "transl.php";
include "db_conn.php";
$dir = transl('C:/PHPServer/OpenServer/domains/print.ses/upload/(' . time() . ')' . $_FILES['userfile']['name']);
if ($_FILES['userfile']['error'] == 0) {
    move_uploaded_file($_FILES['userfile']['tmp_name'], $dir);
    $a = file_get_contents($dir);
    $pos = stripos($a, '/Count');
    $p_count = (int)substr($a, $pos + 6, 10);
    $row = $connection->query("INSERT INTO file (name,p_count,status) VALUES ('$dir','$p_count','0')");
    $row = $connection->query("SELECT id FROM file WHERE name='$dir'");
    $row2 = $row->fetch_assoc();
    echo 'Номер вашего документа: ' . $row2['id'] . '<br>Количество страниц в документе: ' . $p_count . '<br>Стоимость распечатки: ' . ($p_count * 2) . ' руб.';
} else {
    echo $_FILES['userfile']['error'];
}
$del = $connection->query("SELECT name FROM file WHERE status='4'");
$i = 1;
$n = $del->num_rows;
while (($n != 0) AND ($i <= $n)) {
    $i++;
    $name = $del->fetch_assoc();
    unlink($name['name']);
    $de = $connection->query("DELETE FROM file WHERE name='{$name['name']}'");
}
$connection->close();
?>