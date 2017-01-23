<?php
include "db_conn.php";

$uncook = base64_decode($_COOKIE['login']);
$pos = stripos($uncook, '@@@');
$login = substr($uncook, 0, $pos);
$pass = substr($uncook, $pos + 3);
$result = $connection->query("SELECT priv FROM users WHERE login='{$login}' AND pass='{$pass}'");
$row = $result->fetch_assoc();
if ($row['priv'] == 1) {
    $key = key($_POST);
    if ($key > 0) {
        $result = $connection->query("UPDATE file SET status='1' WHERE id='{$key}'");
    }
    $result = $connection->query("SELECT * FROM file WHERE status='0'");
    echo '<table><tr><th>ID</th><th>Расположение</th><th>Стоимость</th><th>Потверждение</th></tr>';
    $i = 1;
    $n = $result->num_rows;
    while (($n != 0) AND ($i <= $n)) {
        $i++;
        $rows = $result->fetch_assoc();
        echo "<tr><td>{$rows['id']}</td><td>{$rows['name']}</td><td>" . ($rows['p_count'] * 2) . '</td><td><form action="" method="POST"><input type="submit" name="' . $rows['id'] . '" value="Подтвердить" /></form></td>';
    }
} else {
    echo 'NO ACCESS';
}
$connection->close();
?>
