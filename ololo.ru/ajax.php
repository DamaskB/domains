<?php
$connection = new mysqli("192.168.1.33", "root", "", "rasp");
// Проверка соединения
if (mysqli_connect_error()) {
    echo "Ошибка соединения: " . mysqli_connect_error();
    exit();
}
if ($_POST['faculty'] != null AND $_POST['name'] == null) {
    $faculty = preg_replace('/[^\p{L}\p{Zs}]/u', '', $_POST['faculty']);
    $result = $connection->query("SELECT DISTINCT name FROM groups WHERE faculty='{$faculty}'");
    while ($row = $result->fetch_assoc()) {
        $result2[] = $row['name'];
    }
    $connection->close();
    echo json_encode($result2);
}
if ($_POST['name'] != null) {
    $faculty = preg_replace('/[^\p{L}\p{Zs}]/u', '', $_POST['faculty']);
    $name = preg_replace('/[^\p{L}\p{Zs}]/u', '', $_POST['name']);
    $result = $connection->query("SELECT DISTINCT course FROM groups WHERE faculty='{$faculty}' AND name='{$name}'");
    while ($row = $result->fetch_assoc()) {
        $result2[] = $row['course'];
    }
    $connection->close();
    echo json_encode($result2);
}
?>