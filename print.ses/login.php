<?php
include "db_conn.php";
$salt = '!@$#%^$%&*^2&(*(*^m&Y$Y%$^%^^&%$j&$$))';
$pass = md5($salt . $_POST['pass']);
$login = $_POST['login'];
$result = $connection->query("SELECT id FROM users WHERE login='{$login}' AND pass='{$pass}'");
$connection->close();
if ($result->num_rows) {
    $cook = base64_encode($login . '@@@' . $pass);
    setcookie('login', $cook, time() + 60 * 2);
    echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=admin.php">';
} else {
    echo 'NOT LOGIN';
}

?>

